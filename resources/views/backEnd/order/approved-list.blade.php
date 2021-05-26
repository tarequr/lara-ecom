@extends('backEnd.master')

@section('title')
Approved | List
@endsection


@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <h4 class="text text-info float-left"> Approved List</h4>
  <div class="table-responsive">
    <div class="text-center">
      <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
      <h3 class="text-center text-danger"></h3>
    </div>
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Order No</th>
          <th>Total Ammount</th>
          <th>Payment Type</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Order No</th>
          <th>Total Ammount</th>
          <th>Payment Type</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($orders as $order)
        <tr>
          <td>{{ $i++ }}</td>
          <td># {{$order->orderNo}}</td>
          <td>{{$order->orderTotal}}</td>
          <td>
            {{$order['payment']['paymentMethod']}}
            @if($order['payment']['paymentMethod'] == 'Bkash')
            (Transaction no : {{$order['payment']['transactionNo']}})
            @endif
          </td>
          <td>
            @if($order->status == '0')
              <span class="bg-warning" style="padding: 5px;">Unapproved</span>
            @elseif($order->status == '1')
              <span class="bg-success" style="padding: 5px;  color: white;">Approved</span>
            @endif
          </td>
          <td>
            <a href="{{route('orders.details',$order->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Details</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection