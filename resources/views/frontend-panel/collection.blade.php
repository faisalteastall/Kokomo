@extends('layouts.frontend_layout')
@section('content')
        <div class="container">
            <div class="row">
                <div class="prd-grid data-to-show-4 data-to-show-md-3 data-to-show-sm-2 prd-text-center mb-4 pb-4">
                    @foreach($products as $key =>$product)
                    <div class="prd prd-has-loader mb-4">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                                <a href="collection-details.php" class="prd-img"><img src="{{url('storage/app/public/products/'.explode(',',$product->prdct_image)[0])}}" data-srcset="{{url('storage/app/public/products/'.explode(',',$product->prdct_image)[0])}}" alt="" class="js-prd-img lazyload" style="width: 255px;height: 301px;"></a>
                                  <div class="label-new">NEW</div>
                                   <div class="gdw-loader"></div> 
                            </div>
                            <div class="prd-info">
                                <h2 class="prd-title"><a href="collection-details.php">{{$product->prdct_name}}</a></h2>
                                <div class="prd-price">
                                    <div class="">{{$product->prdct_highlight}} </div>
                                </div>
                                <div class="prd-price">
                                    <div class="price-new">$ <span id="{{$product->id}}">{{$product->prdct_base_price+explode(',',$product->prdct_size_price)[0]}}</span></div>
                                </div>
                                <div class="prd-hover">
                                    <div class="prd-action">
                                        <button class="btn" onclick="addtobag('{{$product->id}}');"><i class="icon icon-handbag"></i><span>Add To Cart</span></button>
                                        <div class=""><a href="{{ url('collection-detail').'/'.$product->prdct_id}}" class="icon-eye " ></a></div>
                                    </div>
                                    <div class="prd-options prd-hidemobile"><span class="label-options">Sizes:</span>
                                        <ul class="list-options size-swatch">
                                         @foreach(explode(',',$product->prdct_size) as $key=> $size)
                                                @if($key==0)<li class="active userSize_{{$product->id}}">@else<li class="userSize_{{$product->id}}">@endif<a href="#" data-value="36" onclick="priceChange('{{explode(',',$product->prdct_size_price)[$key]}}','{{explode(',',$product->prdct_quantity)[$key]}}','','{{$product->prdct_base_price}}','{{$product->id}}')"><span class="value" data-quantity="{{explode(',',$product->prdct_quantity)[$key]}}" data-price="{{explode(',',$product->prdct_size_price)[$key]}},'','{{$product->prdct_base_price}}','{{$product->id}}">{{$size}}</span></a></li>
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