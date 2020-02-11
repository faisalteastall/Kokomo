<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use DB;
    use App\Order;
    use App\Customer;

    class OrderController extends Controller {

    	public function index()
        { 
            $title    = "Order List";
            $orders   =  Order::orderBy('id','desc')->groupBy('order_id')->paginate(4);
            return view('admin-panel.order.order', compact('title','orders'));
        }
        public function viewOrder($id,$customer_id)
        {
            $title    = "Order Detail";
            $order    =    Order::where('order_id',$id)->get();
            $shipping = json_decode($order[0]->shipping_data);           
            $customer = Customer::where('id','=',$customer_id)->first();
            $order_id = $id;          
            return view('admin-panel.order.order-detail', compact('title','order','order_id','customer','shipping'));
        }
    }
      