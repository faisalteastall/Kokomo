<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Customer;
    use App\Order;
    use DB;

    class CustomerController extends Controller {

        public function index()
        {
            $title="Customer List";
            $customers =  Customer::orderBy('id', 'DESC')->paginate(4);
            $orders    =  new Order;
            return view('admin-panel.customer.customer-list', compact('title','customers','orders'));
        }

        public function viewCustomer($id)
        {
            $title = "Customer Detail"; 
            $customer = Customer::where('customer_id','=',$id)->first();
            $orders   = Order::where('customer_id',$customer->id)->groupBy('order_id')->orderBy('id', 'DESC')->paginate(4);
            return view('admin-panel.customer.customer-detail', compact('title','customer','orders'));
        }
    }