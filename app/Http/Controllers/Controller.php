<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function changeStatus($id,$status,$table)
    {
         $msg = ($status=='0'?'enable':'disable');
         DB::table($table)->where('id',$id)->update(['status'=>$status]);
         $param = ucfirst(substr($table, 0, -1));
         return redirect()->back()->withSuccess("$param $msg successfully!");
    }
}
