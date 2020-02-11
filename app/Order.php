<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['customer_id','order_id','shipping_data','status','coupon_code','discount','price','order_item'];
}