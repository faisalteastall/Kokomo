<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
   protected $fillable = ['name','image','start_date','end_date','status'];
}