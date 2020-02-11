@extends('layouts.layout')
@section('content')
    <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s10 m6 l6">
                                <h5 class="breadcrumbs-title mt-2 mb-0"><span>Banner List</span></h5>
                            </div>
                            <div class="col s2 m6 l6">
                                <a class="btn waves-effect waves-light right" href="{{route('add_banner')}}"><span class="hide-on-small-onl">Add Banner</span></a>
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
                                                                    <th data-field="name">Banner Name</th>
                                                                    <th data-field="price">Banner run date</th>
                                                                    <th data-field="price">Banner run end</th>
                                                                    <th data-field="price">Banner image </th>
                                                                    <th data-field="price">Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             @foreach($banners as $key => $banner)
                                                             <?php $color=($banner->status=='0'?'green':'red');
                                                                   $icon=($banner->status=='0'?'fa-toggle-on':'fa-toggle-off');
                                                                   $status =($banner->status=='0'?'1':'0');
                                                                   $msg = ($status=='0'?'enable':'disable');
                                                                 ?>
                                                                <tr>
                                                                    <td>{{$key+1}}</td>
                                                                      <td>{{$banner->name}}</td>
                                                                    <td>{{date('d M, Y',strtotime($banner->start_date))}}  </td>
                                                                    <td>{{date('d M, Y',strtotime($banner->end_date))}} </td>
                                                                    <td>
                                                                        <div class="masonry-gallery-wrapper">
                                                                            <div class="popup-gallery">
                                                                                <div class="gallery-sizer"></div>
                                                                                <a href="{{url('storage/app/public/banners/'.explode(',',$banner->image)[0])}}">
                                                                                    <img width="80" src="{{url('storage/app/public/banners/'.explode(',',$banner->image)[0])}}" class="responsive-img mb-10" alt="">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td> 
                                                                        <a class="mb-6 btn-floating waves-effect waves-light {{$color}} lightrn-1 tooltipped" data-position="top" data-tooltip="Disable" onclick="removefunction('banner','{{route('change_status',['id'=>$banner->id,'status'=>$status,'table'=>'banners'])}}','{{$msg}}')">
                                                                        <i class="fa {{$icon}}"></i>
                                                                       </a>
                                                                    </td>
                                                                </tr>
                                                             @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col s12">
                                                         {{ $banners->links('vendor.pagination.bootstrap-4') }}
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