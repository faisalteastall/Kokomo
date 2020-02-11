@extends('layouts.frontend_layout')
@section('content')
    <div class="holder mt-4">
    <div class="container">
        <div class="row row-flex prd-block prd-block--creative prd-block--mobile-image-first">
            <div class="col-md-6 col-lg-6 col-xl-6 aside">
                <div class="prd-block_gallery">
                    <div class="prd-block_gallery-grid">
                        @foreach(explode(',',$products->prdct_image) as $key=> $image)
                        <a href="{{url('storage/app/public/products/'.$image)}}" data-value="Silver" data-fancybox="gallery" data-caption="Caption #2" class="prd-has-loader">
                            <div class="gdw-loader"></div><img src="{{url('storage/app/public/products/'.$image)}}" alt="">
                        </a>
                        @endforeach
                       <!--  <a href="images/products/product-02.jpg" data-value="Silver" data-fancybox="gallery" data-caption="Caption #2" class="prd-has-loader">
                            <div class="gdw-loader"></div><img src="images/products/product-02.jpg" alt="">
                        </a>
                        <a href="images/products/product-02.jpg" data-value="Gold" data-fancybox="gallery" data-caption="Caption #3" class="prd-has-loader">
                            <div class="gdw-loader"></div><img src="images/products/product-02.jpg" alt="">
                        </a>
                        <a href="images/products/product-02.jpg" data-value="Gold" data-fancybox="gallery" data-caption="Caption #4" class="prd-has-loader">
                            <div class="gdw-loader"></div><img src="images/products/product-02.jpg" alt="">
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 fixed-col fixed aside js-product-fixed-col">
                <div class="fixed-col_container">
                    <div class="fstart"></div>
                    <div class="fixed-wrapper">
                        <div class="fixed-scroll">
                            <div class="fixed-col_content">
                                <div class="js-prd-gallery" id="prdGallery300">
                                    <div class="prd-block_info js-prd-m-holder mb-2 mb-md-0"></div>
                                    <div class="prd-block_gallery-mobile">
                                        <!-- Product Gallery -->
                                        <div class="prd-block_main-image main-image--slide js-main-image--slide">
                                            <div class="prd-block_main-image-holder js-main-image-zoom" data-zoomtype="inner">
                                                <div class="prd-block_main-image-video js-main-image-video">
                                                    <video loop muted preload="metadata" controls="controls">
                                                        <source src="#">
                                                    </video>
                                                    <div class="gdw-loader"></div>
                                                </div>
                                                <div class="prd-has-loader">
                                                    <div class="gdw-loader"></div><img src="images/products/large/product-01.jpg" class="zoom" alt="" data-zoom-image="images/products/large/product-01.jpg">
                                                </div>
                                                <div class="prd-block_main-image-next slick-next js-main-image-next">NEXT</div>
                                                <div class="prd-block_main-image-prev slick-prev js-main-image-prev">PREV</div>
                                            </div>
                                        </div>
                                        <div class="product-previews-wrapper">
                                            <div class="product-previews-carousel" id="previewsGallery100">
                                                <a href="#" data-value="Gold" data-image="images/products/product-02.jpg" data-zoom-image="images/products/product-02.jpg"><img src="images/products/product-02.jpg" alt=""></a>
                                                <a href="#" data-value="Gold" data-image="images/products/product-02.jpg" data-zoom-image="images/products/product-02.jpg"><img src="images/products/product-02.jpg" alt=""></a>
                                                <a href="#" data-value="Gold" data-image="images/products/product-02.jpg" data-zoom-image="images/products/product-02.jpg"><img src="images/products/product-02.jpg" alt=""></a>
                                                <a href="#" data-value="Gold" data-image="images/products/product-02.jpg" data-zoom-image="images/products/product-02.jpg"><img src="images/products/product-02.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- /Product Gallery -->
                                    </div>
                                </div>
                                <div class="prd-block_info">
                                    <div class="js-prd-d-holder prd-holder">
                                        <div class="prd-block_title-wrap">
                                            <h1 class="text-normal mt-4 mb-0">{{$products->prdct_name}}</h1>
                                        </div>
                                        <p class=" w-100">{{$products->prdct_highlight}}</p>
                                    </div>
                                    <div class="prd-block_options topline pl-lg-6">
                                        <div class="prd-block_title-wrap ">
                                            <h1 class="text-normal mb-0"><span id="base_price">{{$products->prdct_base_price+explode(',',$products->prdct_size_price)[0]}}</span>$ <small class="pl-4">inclusive of all taxes</small></h1>
                                        </div>
                                        <div class="prd-size swatches mt-2">
                                            <select id="optionsSelect02">
                                                <option value="36" selected="selected">S</option>
                                                <option value="38">M</option>
                                                <option value="40">XL</option>
                                                <option value="42">XXL</option>
                                            </select>
                                            <ul class="size-list js-size-list" data-select-id="optionsSelect02"><span class="option-label">Size:</span>
                                                @foreach(explode(',',$products->prdct_size) as $key=> $size)
                                                @if($key==0)<li class="active userSize_{{$products->id}}">@else<li class="userSize_{{$products->id}}">@endif<a href="#" data-value="36" onclick="priceChange('{{explode(',',$products->prdct_size_price)[$key]}}','{{explode(',',$products->prdct_quantity)[$key]}}')"><span class="value" data-quantity="{{explode(',',$products->prdct_quantity)[$key]}}" data-price="{{explode(',',$products->prdct_size_price)[$key]}}">{{$size}}</span></a></li>
                                                @endforeach
                                               <!--  <li class="active"><a href="#" data-value="38"><span class="value">M</span></a></li>
                                                <li><a href="#" data-value="40"><span class="value">XL</span></a></li>
                                                <li><a href="#" data-value="42"><span class="value">XXL</span></a></li> -->
                                            </ul>
                                            <div class="option-links"><a href="#" data-fancybox data-src="#sizeGuide">Size Chart</a></div>
                                            <div class="modal--simple modal--lg" id="sizeGuide" style="display: none;">
                                                <div class="modal-header">
                                                    <div class="modal-header-title">SIZE GUIDE</div>
                                                </div>
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="panel-group" id="sizeAccordion">
                                                            <div class="panel">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#sizeAccordion" href="#sizeCollapse1">Women's Size Conversions</a></h4>
                                                                </div>
                                                                <div id="sizeCollapse1" class="panel-collapse collapse show">
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped table--size">
                                                                                <tr>
                                                                                    <th scope="row">US Sizes</th>
                                                                                    <td>6</td>
                                                                                    <td>6,5</td>
                                                                                    <td>7</td>
                                                                                    <td>7,5</td>
                                                                                    <td>8</td>
                                                                                    <td>8,5</td>
                                                                                    <td>9</td>
                                                                                    <td>9,5</td>
                                                                                    <td>10</td>
                                                                                    <td>10,5</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Euro Sizes</th>
                                                                                    <td>39</td>
                                                                                    <td>39</td>
                                                                                    <td>40</td>
                                                                                    <td>40-41</td>
                                                                                    <td>41</td>
                                                                                    <td>41-42</td>
                                                                                    <td>42</td>
                                                                                    <td>42-43</td>
                                                                                    <td>43</td>
                                                                                    <td>43-44</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">UK Sizes</th>
                                                                                    <td>5,5</td>
                                                                                    <td>6</td>
                                                                                    <td>6,5</td>
                                                                                    <td>7</td>
                                                                                    <td>7,5</td>
                                                                                    <td>8</td>
                                                                                    <td>8,5</td>
                                                                                    <td>9</td>
                                                                                    <td>9,5</td>
                                                                                    <td>10</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Inches</th>
                                                                                    <td>9.25&quot;</td>
                                                                                    <td>9.5&quot;</td>
                                                                                    <td>9.625&quot;</td>
                                                                                    <td>9.75&quot;</td>
                                                                                    <td>9.9375&quot;</td>
                                                                                    <td>10.125&quot;</td>
                                                                                    <td>10.25&quot;</td>
                                                                                    <td>10.5&quot;</td>
                                                                                    <td>10.625&quot;</td>
                                                                                    <td>10.75&quot;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">CM</th>
                                                                                    <td>23,5</td>
                                                                                    <td>24,1</td>
                                                                                    <td>24,4</td>
                                                                                    <td>24,8</td>
                                                                                    <td>25,4</td>
                                                                                    <td>25,7</td>
                                                                                    <td>26</td>
                                                                                    <td>26,7</td>
                                                                                    <td>27</td>
                                                                                    <td>27,3</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                      
                                        </div>
                                        
                                        <div class="prd-block_qty mt-2"><span class="option-label">Qty:</span>
                                            <div class="qty qty-changer">
                                                <fieldset>
                                                    <input type="button" value="&#8210;" class="decrease" onclick="priceChange('{{explode(',',$products->prdct_size_price)[0]}}','{{explode(',',$products->prdct_quantity)[0]}}','decrease')">
                                                    <input type="text" class="qty-input" value="1" data-min="1" data-max="{{explode(',',$products->prdct_quantity)[0]}}" id="changeInput" name="changeInput" >
                                                    <input type="button" value="+" class="increase" onclick="priceChange('{{explode(',',$products->prdct_size_price)[0]}}','{{explode(',',$products->prdct_quantity)[0]}}','increase')">
                                                </fieldset>
                                            </div><span class="option-label">max <span class="qty-max">{{explode(',',$products->prdct_quantity)[0]}}</span> item(s)</span>
                                        </div>
                                        <div class="text-center col-md-8 ">
                                            <button class="btn mt-2 btn-new-bg" onclick ="addtobag('{{$products->id}}')">Add to Bag</button>
                                        </div>
                                    </div>
                                    <div class="prd-block_options topline pl-lg-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class=" w-100 mb-1">Size & Fit </h4>
                                                <p class=" w-100 mt-1">{{$products->prdct_fit}} Fit </p>
                                            </div>
                                            <div class="col-md-7">
                                                <h4 class=" w-100 mb-1">Material & Care </h4>
                                                <p class=" w-100 mt-1">{{$products->prdct_material_care}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prd-block_actions topline">
                                        <h4 class="text-normal mb-0 w-100">Description</h4>
                                        <ol class="nom w-100">
                                           @foreach(json_decode($products->prdct_desc) as $key=>$description)
                                            <li>{{$description}}</li>
                                           @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="holder mt-4">
    <div class="container">
        <div class="col-md-12 col-lg-12 col-xl-12 ">
            <h1 class="text-normal mb-0">Product Highlight</h1>
            <p class=" w-100">{{$products->prdct_highlight}}</p>
        </div>
    </div>
    </div>
    <div class="holder mt-4">
    <div class="container">
        <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2 mb-4" data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}' style="margin-bottom: 20px;">
           @foreach($slideproducts as $key1=> $slide)
            <div class="prd prd-has-loader prd-new <?php if($key1==0){ echo "prd-popular";}?>">         
                <div class="prd-inside">
                    <div class="prd-img-area">
                        <a href="collection-details.php" class="prd-img"><img src="{{url('storage/app/public/products/'.explode(',',$slide->prdct_image)[0])}}" data-srcset="{{url('storage/app/public/products/'.explode(',',$slide->prdct_image)[0])}}" alt="Glamor shoes" class="js-prd-img lazyload" style="width: 255px;height: 301px;"></a>
                        <div class="label-new">NEW</div>
                    </div>
                    <div class="prd-info text-center">
                        <h2 class="prd-title "><a href="collection-details.php">{{$slide->prdct_name}}</a></h2>
                        <div class="prd-price">
                            <div class="">{{$slide->prdct_highlight}} </div>
                        </div>
                         <div class="prd-price">
                                    <div class="price-new">$ <span id="{{$slide->id}}">{{$slide->prdct_base_price+explode(',',$slide->prdct_size_price)[0]}}</span></div>
                                </div>
                        <div class="prd-hover">
                            <div class="prd-action">
                                 <button class="btn" onclick="addtobag('{{$slide->id}}')"><i class="icon icon-handbag"></i><span>Add To Cart</span></button>
                                <div class="prd-links"><a href="{{ url('collection-detail').'/'.$slide->prdct_id}}"" class="icon-eye " ></a></div>
                            </div>
                             <div class="prd-options prd-hidemobile"><span class="label-options">Sizes:</span>
                                        <ul class="list-options size-swatch">
                                         @foreach(explode(',',$slide->prdct_size) as $key=> $size)
                                                @if($key==0)<li class="active userSize_{{$slide->id}}">@else<li class="userSize_{{$slide->id}}">@endif<a href="#" data-value="36" onclick="priceChange('{{explode(',',$slide->prdct_size_price)[$key]}}','{{explode(',',$slide->prdct_quantity)[$key]}}','','{{$slide->prdct_base_price}}','{{$slide->id}}')"><span class="value" data-quantity="{{explode(',',$slide->prdct_quantity)[$key]}}" data-price="{{explode(',',$slide->prdct_size_price)[$key]}},'','{{$slide->prdct_base_price}}','{{$slide->id}}">{{$size}}</span></a></li>
                                                @endforeach
                                           
                                        </ul>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
         
            
        </div>
     </div>
    </div>
@endsection