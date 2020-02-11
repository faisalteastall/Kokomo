<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
   protected $fillable = ['coupon_name','coupon_code','coupon_type','coupon_amount','max_discount','available_limit','start_date','end_date','status','max_user_limit','per_user_limit','coupon_banner'];
}