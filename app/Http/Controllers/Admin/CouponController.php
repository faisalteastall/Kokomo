<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;
    use App\Coupon;
    use DB;

    class CouponController extends Controller {

        public function index()
        {
            $title="Coupon List";
            $coupons =  Coupon::orderBy('id', 'DESC')->paginate(4);
            return view('admin-panel.coupon.coupon-list', compact('title','coupons'));
        }

        public function addCoupon()
        {
            $title="Add Coupon";
            return view('admin-panel.coupon.add-coupon', compact('title'));
        }

        public function saveCoupon(Request $request)
        {
            $coupon_image = '';
            $validator=Validator::make($request->all(), [
            'coupon_name'     =>  'required',
            'coupon_code'     =>  'required',
            'coupon_type'     =>  'required',
            'coupon_amount'   =>  'required|numeric|not_in:0',
            'start_date'      =>  'required|date',
            'max_user_limit'  =>  'required|numeric|not_in:0',
            'per_user_limit'  =>  'required|numeric|not_in:0',
            'end_date'        =>  'required|date|after:start_date',
            'description.*'   =>  'required|min:3|max:1000',
            'images'          =>  'required',
            'images.*'        =>  'mimes:jpg,jpeg,png,bmp|max:20000',
              ]);
            $validator->validate();
            if($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $coupon_image .= $file->hashName() .',';
                    $file->move(storage_path('app/public/coupons/'), $file->hashName());
                }
            }
            $coupon_image = rtrim($coupon_image, ',');
            $couponData  = [               
                'coupon_name'     =>  $request->coupon_name,
                'coupon_code'     =>  $request->coupon_code,
                'coupon_type'     =>  $request->coupon_type,
                'coupon_amount'   =>  $request->coupon_amount,
                'max_discount'    =>  $request->max_discount,
                'start_date'      =>  $request->start_date,
                'max_user_limit'  =>  $request->max_user_limit,
                'per_user_limit'  =>  $request->per_user_limit,
                'available_limit' =>  $request->max_user_limit,
                'end_date'        =>  $request->end_date,
                'description'     =>  implode(',',$request->description),
                'coupon_banner'   =>  $coupon_image,                         
              ];            
             
            $coupon = Coupon::create($couponData);

            return redirect()->back()->withSuccess('Coupon added successfully!');
        }

        public function removeCoupon($id,$status)
        {
           
        }
    }