<?php
    namespace App\Http\Controllers\Frontend;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Session;
    use DB;
    use App\Banner;
    
    class HomeController extends Controller {

        public function index()
        {
            $title="Home";
            $banners =  Banner::whereDate('start_date', '<=', date("Y-m-d"))
                               ->whereDate('end_date', '>=', date("Y-m-d"))
                               ->where('status', '=','0')
                               ->orderBy('id', 'DESC')
                               ->get([DB::raw('group_concat(image) as images')])->toArray();
            $banner_image  =explode(',', $banners[0]['images']);                    
            return view('frontend-panel.index', compact('title','banner_image'));
        }

        public function about()
        {
            $title="About-Us";
            return view('frontend-panel.about', compact('title'));
        }
        
        public function contact()
        {
            $title="Contact-Us";
            return view('frontend-panel.contact', compact('title'));
        }

        
        
    }