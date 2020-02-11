@extends('layouts.layout')
@section('content')
    <div class="row">
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-2 mb-0"><span>Coupon List</span></h5>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn waves-effect waves-light right" href="{{route('add_coupon')}}"><span class="hide-on-small-onl">Add Coupon</span></a>
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
                                                    <table class="responsive-table">
                                                        <thead>
                                                            <tr>
                                                                <th data-field="id">#</th>
                                                                <th data-field="name">Coupon Name</th>
                                                                <th data-field="price">Coupon Code</th>
                                                                <th data-field="price">Coupon Type</th>
                                                                <th data-field="price">Coupon Amount</th>
                                                                <th data-field="price">Max Discount</th>
                                                                <th data-field="price">Start &amp; End Date </th>
                                                                <th data-field="price">Max user limit</th>
                                                                <th data-field="price">Per user limit</th>
                                                                <th data-field="price">User applyed </th>
                                                                <th data-field="price">Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($coupons as $key=>$coupon)
                                                         <?php $color=($coupon->status=='0'?'green':'red');
                                                               $icon =($coupon->status=='0'?'fa-toggle-on':'fa-toggle-off');
                                                               $status =($coupon->status=='0'?'1':'0');
                                                               $msg = ($status=='0'?'enable':'disable');
                                                                 ?>
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$coupon->coupon_name}}</td>
                                                                <td >{{$coupon->coupon_code}}</td>
                                                                <td class="text-uppercase">{{($coupon->coupon_type=='1' ? 'Fixed Amount': 'Percentage')}}</td>
                                                                <td class="text-uppercase">{{$coupon->coupon_amount}}</td>
                                                                <td class="text-uppercase">{{($coupon->max_discount=='' ? 'N/a': $coupon->max_discount)}}</td>
                                                                <td>{{date('d M, Y',strtotime($coupon->start_date))}}.  to<br> {{date('d M, Y',strtotime($coupon->end_date))}}.</td>
                                                                <td>{{$coupon->max_user_limit}} </td>
                                                                <td>{{$coupon->per_user_limit}}</td>
                                                                <td>50</td>
                                                                <td> 
                                                                    <a href="order.php" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                                        <i class="material-icons">remove_red_eye</i>
                                                                    </a>
                                                                    <a class="mb-6 btn-floating waves-effect waves-light {{$color}} lightrn-1 tooltipped" data-position="top" data-tooltip="Disable" onclick="removefunction('coupon','{{route('change_status',['id'=>$coupon->id,'status'=>$status,'table'=>'coupons'])}}','{{$msg}}')">
                                                                        <i class="fa {{$icon}}"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col s12">
                                                    {{ $coupons->links('vendor.pagination.bootstrap-4') }}
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