<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderDetail;
use App\Model\Payment;
use App\Model\Order;
use App\User;
use Session;
use Auth;
use Cart;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user     = Auth::user();
        $customer = $user->id;

        Session::put('customer_id',$customer);

   		return view('frontEnd.check_out.customer-dashboard',compact('user'));
    }

    public function editProfile()
    {
        $data['editData'] = User::find(Auth::user()->id);

   		return view('frontEnd.check_out.customer-edit-profile',$data);
    }

    public function updateProfile(Request $request)
    {
    	$user = User::find(Auth::user()->id);

    	$this->validate($request,[
            'name'   => 'required',
            'email'  => 'required|unique:users,email,'.$user->id,
            'mobile' => ['required','unique:users,mobile,'.$user->id,'regex:/(^(\+8801|880|01|008801))[1|5-9]{1}(\d){8}$/']
        ]);
        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->mobile  = $request->mobile;
        $user->address = $request->address;
        $user->gender  = $request->gender;

        if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/user_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$user['image'] = $filename;
    	}
    	$user->save();

    	Session::flash('success','Profile Update Successfully!');
    	return redirect()->route('customer.dashboard');
    }

    public function passwordChange()
    {
   		return view('frontEnd.check_out.customer-password-change');
    }

    public function passwordUpdate(Request $request)
    {
    	$this->validate($request,[
    		'newPassword'     => 'required|min:6',
    		'confirmPassword' => 'required_with:newPassword|same:newPassword|min:6'
    	]);

    	if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->currentPassword])) {
    		
    		$user = User::find(Auth::user()->id);
    		$user->password = bcrypt($request->newPassword);
    		$user->save();

    		Session::flash('success','Password change successfully');
    		return redirect()->route('customer.dashboard');

    	}else{
    		Session::flash('error','Sorry! your current password dost not match');
    		return redirect()->back();
    	}
    }

    public function payment(Request $request)
    {
        return view('frontEnd.check_out.customer-payment');
    }

    public function paymentStore(Request $request)
    {
        if ($request->productId == NULL) {
            Session::flash('error','Please add any product');
            return redirect()->back();
        }else{

            $this->validate($request,[
                'paymentMethod'   => 'required'
            ]);
            DB::transaction(function() use($request){
                $payment = new Payment();
                $payment->paymentMethod = $request->paymentMethod;
                $payment->save();

                $order = new Order();
                $order->userId     = Auth::user()->id;
                $order->shippingId = $request->session()->get('shippingId');
                $order->paymentId  = $payment->id;

                $orderData = Order::orderBy('id', 'desc')->first();
                if ($orderData == null) {
                    $firstReg = '0';
                    $orderNo  = $firstReg+1;
                }else{
                    $orderData = Order::orderBy('id', 'desc')->first()->orderNo;
                    $orderNo   = $orderData+1;
                }
                $order->orderNo    = $orderNo;
                $order->orderTotal = $request->orderTotal;
                $order->status     = '0';
                $order->save();

                $contents =  Cart::content();
                foreach ($contents as $content) {
                    $orderDetails = new OrderDetail();
                    $orderDetails->orderId   = $order->id;
                    $orderDetails->productId = $content->id;
                    $orderDetails->quantity  = $content->qty;
                    $orderDetails->save();
                }
            });
        }
        Cart::destroy();
        Session::flash('success','Data save successfully');
        return redirect()->route('customer.order.list');
    }

    public function orderList()
    {
        $data['orders'] = Order::where('userId',Auth::user()->id)->get();
        return view('frontEnd.check_out.customer-order',$data);
    }

    public function orderDetails($id)
    {
        $orderData = Order::find($id);
        $data['orders'] = Order::where('id',$orderData->id)->where('userId',Auth::user()->id)->first();
        
        if ($data['orders'] == false) {
            Session::flash('error','Do not try to be over samrt!');
            return redirect()->back();
        }else{
            $data['orders']   = Order::with(['orderDetails'])->where('id',$orderData->id)->where('userId',Auth::user()->id)->first();
            
            return view('frontEnd.check_out.customer-order-details',$data);
        }
        
    }

}
