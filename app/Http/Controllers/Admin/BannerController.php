<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;
    use App\Banner;
    use DB;

    class BannerController extends Controller {

        public function index()
        {
            $title="Banner List";
            $banners =  Banner::orderBy('id', 'DESC')->paginate(4);
            return view('admin-panel.banner.banner-list', compact('title','banners'));
        }

        public function addBanner()
        {
            $title="Add Banner";
            return view('admin-panel.banner.add-banner', compact('title'));
        }

        public function saveBanner(Request $request)
        {   
            $banner_image = '';
            $validator=Validator::make($request->all(), [
            'banner_name'     =>  'required',
            'run_start_date'  =>  'required|date',
            'run_end_date'    =>  'required|date|after:run_start_date',
            'images'          => 'required',
            'images.*'        => 'mimes:jpg,jpeg,png,bmp|max:20000',
              ]);
            $validator->validate();
            if($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $banner_image .= $file->hashName() .',';
                    $file->move(storage_path('app/public/banners/'), $file->hashName());
                }
            }
            $banner_image = rtrim($banner_image, ',');
            $bannerData  = [                
                'name'         => $request->banner_name,
                'start_date'   => $request->run_start_date,
                'end_date'     => $request->run_end_date,
                'image'        => $banner_image,                
              ];            
             
            $banner = Banner::create($bannerData);

            return redirect()->back()->withSuccess('Banner added successfully!');         
        }
    }