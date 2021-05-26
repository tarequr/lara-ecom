<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\User;
use Mail;
use DB;
use Auth;
use Session;


class CheckoutController extends Controller
{
    public function customerLogin()
    {
        return view('frontEnd.check_out.customer-login');
    }

    public function customerSignup()
    {
        return view('frontEnd.check_out.customer-signup');

    }
    public function signupStore(Request $request)
    {
        DB::transaction(function() use($request){
            $this->validate($request,[
                'name'   => 'required',
                'email'  => 'required|unique:users,email',
                'mobile' => ['required','unique:users,mobile','regex:/(^(\+8801|880|01|008801))[1|5-9]{1}(\d){8}$/'],
                'password'        => 'min:6|required_with:confirmPassword|same:confirmPassword',
                'confirmPassword' => 'min:6'
            ]);
            $code = rand(0000,9999);
            $user = new User();
            $user->name      = $request->name;
            $user->email     = $request->email;
            $user->mobile    = $request->mobile;
            $user->password  = bcrypt($request->password);
            $user->user_type = 'customer';
            $user->status    = '0';
            $user->code      = $code;
            $user->save();

            $data = array(
                'email' => $request->email,
                'code'  => $code
            );

            Mail::send('frontEnd.email.verify-email',$data, function($message) use($data) {
                $message->from('tanjirhasan2020@gmail.com','E-commerce By Sabbir');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });


        });

        Session::flash('success','You have successfully signed up, Please verify your email!');
        return redirect()->route('email.verify');
    }

    public function emailVerify()
    {
        return view('frontEnd.check_out.email-verify');

    }

    public function emailStore(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'code'  => 'required'
        ]);

        $checkData = User::where('email', $request->email)->where('code', $request->code)->first();

        if ($checkData) 
        {
            $checkData->status = '1';
            $checkData->save();

            Session::flash('success','Verify successfully done, Please login!');
            return redirect()->route('customer.login');
        }else{
            Session::flash('wrong','Sorry! email or varification code invalid.');
            return redirect()->back();
        }
    }

    public function shippingInfo()
    {
        return view('frontEnd.check_out.customer-checkout');
    }

    public function shippingInfoStore(Request $request)
    {
        $this->validate($request,[
            'name'     => 'required',
            'mobileNo' => ['required','regex:/(^(\+8801|880|01|008801))[1|5-9]{1}(\d){8}$/'],
            'address'  => 'required',
        ]);

        $checkout = new Shipping();
        $checkout->userId   = Auth::user()->id;
        $checkout->name     = $request->name;
        $checkout->email    = $request->email;
        $checkout->mobileNo = $request->mobileNo;
        $checkout->address  = $request->address;
        $checkout->save();

        $request->session()->put('shippingId', $checkout->id);

        Session::flash('success','Data save successfully');
        return redirect()->route('customer.payment');
    }
}
