@extends('layouts.frontend_layout')
@section('content')
      <div class="holder fullwidth full-nopad mt-0">
                <div class="container-fluid px-0">
                    <div class="bnslider-wrapper">
                        <div class="bnslider bnslider--lg keep-scale" id="bnslider-001" data-slick='{"arrows": true, "dots": true}' data-autoplay="true" data-speed="5000" data-start-width="1920" data-start-height="auto" data-start-mwidth="480" data-start-mheight="578">@foreach($banner_image as $key=>$image)
                            <div class="bnslider-slide bnslide-fashion-3-1">
                                <div class="bnslider-image-mobile" style="background-image: url('<?php echo "storage/app/public/banners/".$image?>')"></div>
                                <div class="bnslider-image" style="background-image: url('<?php echo "storage/app/public/banners/".$image?>');"></div>                            
                            </div>
                        @endforeach
                        </div>                      
                        <div class="bnslider-arrows bnslider-arrows--bg container">
                            <div></div>
                        </div>
                        <div class="bnslider-dots vert-dots container-fluid"></div>
                    </div>
                </div>
      </div>
@endsection