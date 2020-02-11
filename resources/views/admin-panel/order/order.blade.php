@extends('layouts.layout')
@section('content')
            <div class="row">
              <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s10 m6 l6">
                                <h5 class="breadcrumbs-title mt-2 mb-0"><span>Order List</span></h5>
                            </div>
                            <div class="col s2 m6 l6">
                               
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
                                                                    <th data-field="id">ID</th>
                                                                    <th data-field="name">Date</th>
                                                                    <th data-field="name">Product ID</th>
                                                                    <th data-field="name">Product Name</th>
                                                                    <th data-field="name">Size</th>
                                                                    <th data-field="name">Price</th>
                                                                    <th data-field="name">Qty.</th>
                                                                    <th data-field="price">Status</th>
                                                                    <th data-field="price">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($orders as $key=> $order)
                                                              <?php $item = json_decode($order['order_item'])->item;
                                                                    $color=($order->status=='0'?'green':'red');
                                                                    $icon=($order->status=='0'?'fa-toggle-on':'fa-toggle-off');
                                                                    $status =($order->status=='0'?'1':'0');
                                                                    $msg = ($status=='0'?'enable':'disable');
                                                              ?>
                                                                <tr>
                                                                    <td>{{$order->order_id}}</td>
                                                                    <td>{{date('d M, Y',strtotime($order->created_at))}}</td>
                                                                    <td>{{$item->prdct_id}}</td>
                                                                    <td>{{$item->prdct_name}}</td>
                                                                    <td>{{json_decode($order['order_item'])->size}}</td>
                                                                    <td>$ {{json_decode($order['order_item'])->price}}</td>
                                                                    <td>{{json_decode($order['order_item'])->qty}}</td>
                                                                    <td>Placed</td>
                                                                    <td> 
                                                                        <a href="{{route('order_detail',['id'=>$order->order_id,'customer_id'=>$order->customer_id])}}" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                                            <i class="material-icons">remove_red_eye</i>
                                                                        </a>
                                                                         <a class="mb-6 btn-floating waves-effect waves-light {{$color}} lightrn-1 tooltipped" data-position="top" data-tooltip="Disable" onclick="removefunction('order','{{route('change_status',['id'=>$order->id,'status'=>$status,'table'=>'orders'])}}','{{$msg}}')">
                                                                        <i class="fa {{$icon}}"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col s12">
                                                         {{ $orders->links('vendor.pagination.bootstrap-4') }}
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
                        