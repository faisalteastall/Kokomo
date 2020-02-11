@extends('layouts.layout')
@section('content')
            <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s10 m6 l6">
                                <h5 class="breadcrumbs-title mt-1 mb-0"><span>Product List</span></h5>
                            </div>
                            <div class="col s2 m6 l6">
                                <a class="btn waves-effect waves-light right" href="{{route('add_product')}}"><span class="hide-on-small-onl">Add Product</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <div class="container">
                        <div class="section">
                            <div class="row">
                                <div class="col s12">
                                    <div id="borderless-table" class="card card-tabs">
                                        <div class="card-content">
                                            <div id="view-borderless-table">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th data-field="id">#</th>
                                                                    <th data-field="name">Product Name</th>
                                                                    <th data-field="price">Price</th>
                                                                    <th data-field="price">Size</th>
                                                                    <th data-field="price">Quantity</th>
                                                                    <th data-field="price" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Size & Fit </th>
                                                                    <th data-field="price">Material & Care </th>
                                                                    <th data-field="price">Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($products as $key => $product)
                                                            <?php $color=($product->status=='0'?'green':'red');
                                                                   $icon=($product->status=='0'?'fa-toggle-on':'fa-toggle-off');
                                                                   $status =($product->status=='0'?'1':'0');
                                                                   $msg = ($status=='0'?'enable':'disable');
                                                                 ?>
                                                                <tr>
                                                                    <td>{{$key+1}}</td>
                                                                    <td>{{$product->prdct_name}}</td>
                                                                    <td>{{$product->prdct_base_price}}</td>
                                                                    <td>{{$product->prdct_quantity}}</td>
                                                                    <td>{{$product->prdct_size}}</td>
                                                                    <td>{{$product->prdct_fit}}</td>
                                                                    <td>{{$product->prdct_material_care}}</td>
                                                                    <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"> 
                                                                        <a class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View" href="{{route('view_product',['id'=>$product->prdct_id])}}">
                                                                            <i class="material-icons">remove_red_eye</i>
                                                                        </a>
                                                                        <a class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="Edit" href="{{route('edit_product',['id'=>$product->prdct_id])}}">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>
                                                                        <a class="mb-6 btn-floating waves-effect waves-light {{$color}} lightrn-1 tooltipped" data-position="top" data-tooltip="Disable" onclick="removefunction('product','{{route('change_status',['id'=>$product->id,'status'=>$status,'table'=>'products'])}}','{{$msg}}')">
                                                                        <i class="fa {{$icon}}"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach  
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col s12">
                                                     {{ $products->links('vendor.pagination.bootstrap-4') }}
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
            </div>
        </div>
@endsection
       