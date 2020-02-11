@extends('layouts.layout')
@section('content')
   <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                    <!-- Search for small screen-->
                    <div class="container">
                        <div class="row">
                            <div class="col s10 m6 l6">
                                <h5 class="breadcrumbs-title mt-1 mb-0"><span>Add Banner</span></h5>                               
                            </div>
                            <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light right" href="banner.php"><span class="hide-on-small-onl">Back</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <div class="container">
                        <div class="seaction">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div id="Form-advance" class="card card card-default scrollspy">
                                        <div class="card-content">
                                            <form action="{{route('save_banner')}}" method="post" enctype="multipart/form-data" >
                                               {{ csrf_field() }}
                                                 <div class="row">
                                                    <div class="input-field col m6 s12 {{ $errors->has('banner_name') ? ' has-error' : '' }}">
                                                        <input id="Name" type="text" name="banner_name" value="{{old('banner_name')}}">
                                                        <label for="Name">Banner Name</label>
                                                        @if ($errors->has('banner_name'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('banner_name') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12 {{ $errors->has('run_start_date') ? ' has-error' : '' }}">
                                                        <input  class="datepicker" id="birthdate" type="text" name="run_start_date" value="{{old('run_start_date')}}">
                                                        <label for="birthdate"> Banner run date</label>
                                                        @if ($errors->has('run_start_date'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('run_start_date') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>                                                   
                                                    <div class="input-field col m6 s12 {{ $errors->has('run_end_date') ? ' has-error' : '' }}">
                                                        <input  class="datepicker" id="birthdate" type="text" name="run_end_date" value="{{old('run_end_date')}}">
                                                        <label for="birthdate"> Banner run end</label>
                                                        @if ($errors->has('run_end_date'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('run_end_date') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>                                                   
                                                </div>
                                                <div class="row">
                                                    <div class="col m12 s12 file-field input-field">
                                                    <h6 class="pb-2">Banner Image</h6>
                                                        <div class="input-images"></div>
                                                            @if ($errors->has('images'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('images') }}</strong>
                                                                </span>
                                                             @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn purple waves-effect purple right" type="submit" name="action">Submit
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   </div>
@endsection