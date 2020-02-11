<?php
namespace App;
use Illuminate\Database\Eloquent\Model; 

class Product extends Model
{
   protected $fillable = ['prdct_id','prdct_name','prdct_desc','prdct_size','prdct_material_care','prdct_highlight','prdct_image','prdct_fit','prdct_quantity','prdct_size_price','prdct_base_price','prdct_status','hit_count'];
   
}