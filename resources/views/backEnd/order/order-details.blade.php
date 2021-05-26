@extends('backEnd.master')

@section('title')
Approved | List
@endsection


@section('content')
<style type="text/css">
    .prof li{
      background: #17818F;
      padding: 7px;
      margin: 3px;
      border-radius: 15px;
    }
    .prof li a{
      color: #fff;
      padding-left: 15px;
    }
    .mytable{
      padding: 10px;
    }
  </style>

<div class="card shadow mb-4">
  <div class="card-body">
    <h4 class="text text-info float-left"> Order Details</h4>
    <a href="{{route('orders.approved.list')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Approved List</a>
    <div class="table-responsive">
      <div class="text-center">
        <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
        <h3 class="text-center text-danger"></h3>
      </div>
      <h2 class="text-info"></h2>
      <span class="text-warning"></span>
        <table class="table mytable" border="1" width="100%">
          <tr>
              <td width="30%"><strong>Billing Info: </strong></td>
              <td width="70%" colspan="2" style="text-align: left;">
                <span>
                  <strong class="ml-3"> Name: </strong>{{$orders['shipping']['name']}}
                </span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>
                  <strong class="ml-3"> Mobile No: </strong>{{$orders['shipping']['mobileNo']}}
                </span><br>
                <span>
                  <strong class="ml-3"> Email: </strong>{{$orders['shipping']['email']}}
                </span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>
                  <strong class="ml-3"> Address: </strong>{{$orders['shipping']['address']}}
                </span><br>
                <span>
                  <strong class="ml-3"> Payment: </strong>
                  {{$orders['payment']['paymentMethod']}}
                  @if($orders['payment']['paymentMethod'] == 'Bkash')
                  (Transaction no : {{$orders['payment']['transactionNo']}})
                  @endif
                </span><br>
                <strong>Order No: # {{$orders->orderNo}}</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"><strong>Order Details</strong></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Product name & Image</strong></td>
              <td><strong>Quantity & Price</strong></td>
            </tr>
            @foreach($orders['orderDetails'] as $order)
            <tr>
              <td colspan="2"><br>
                <img src="{{url('public/upload/product_images/'.$order['product']['image'])}}" style="width: 60px; height: 60px;"><br>
                <span><strong>Name: </strong>{{$order['product']['name']}}</span>
              </td>
              <td>
                @php
                  $subTotal = $order->quantity*$order['product']['price'];
                @endphp
                {{$order->quantity}} x {{$order['product']['price']}} = {{$subTotal}}
              </td>
            </tr>
            @endforeach
            <tr style="background: #e9ecef;">
              <td colspan="2" style="text-align: left; padding: 10px;"><strong style="margin-left: 15px;">Grand Total</strong></td>
              <td><strong>{{$orders->orderTotal}} TK.</strong></td>
            </tr>
        </table>
    </div>
  </div>
</div>

@endsection