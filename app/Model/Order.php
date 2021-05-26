<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function payment()
    {
    	return $this->belongsTo(Payment::class, 'paymentId','id');
    }

    public function shipping()
    {
    	return $this->belongsTo(Shipping::class, 'shippingId','id');
    }

    public function orderDetails()
    {
    	return $this->hasMany(OrderDetail::class, 'orderId','id');
    }
}
