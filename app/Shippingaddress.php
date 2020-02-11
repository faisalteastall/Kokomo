<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Shippingaddress extends Model
{
   protected $table = 'shipping_address';
   protected $fillable = ['first_name','last_name','house_number','customer_id','primary_contact_number','alternate_contact_number','street','city','landmark','state','status','pincode'];
}