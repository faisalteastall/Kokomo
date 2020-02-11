@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="col s12 mt-3">
         <div class="container">
            <div class="section" id="faq">
                <div class="faq row">
                    <div class="col s12 m6 l6">
                        <a class="black-text">
                            <div class="card z-depth-0 grey lighten-3 faq-card">
                                <div class="card-content center-align">
                                    <i class="material-icons dp48 blue-text">border_all</i>
                                    <h6><b>Product ID</b></h6>
                                    <p>OR-48787</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l6">
                        <a class="black-text">
                            <div class="card z-depth-0 grey lighten-3 faq-card">
                                <div class="card-content center-align">
                                    <i class="material-icons dp48 blue-text">border_all</i>
                                    <h6><b>Product Name</b></h6>
                                    <p>Roshan Singh</p>
                                </div>
                            </div>
                        </a>
                    </div>                            
                    <div class="col s12 m3 l3">
                        <div class="card mt-2">
                            <div class="card-content">
                                <span class="card-title">Basic Details</span>
                                <div class="category-list">
                                    <ul class="collection ">                                                  
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col-12 s6">
                                                    <p class="collections-title font-weight-600">Sub title</p>
                                                    <p class="collections-content">Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                        </li>                                                    
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col-12 s6">
                                                    <p class="collections-title font-weight-600">Bace Price</p>
                                                    <p class="collections-content">Rs 5555 </p>
                                                </div>
                                            </div>
                                        </li>                                                    
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col-12 s6">
                                                    <p class="collections-title font-weight-600">SIZE &amp; FIT</p>
                                                    <p class="collections-content">Regular Fit </p>
                                                </div>
                                            </div>
                                        </li>                                                    
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col-12 s6">
                                                    <p class="collections-title font-weight-600"> MATERIAL &amp; CARE</p>
                                                    <p class="collections-content"> Nylon &amp; polyester bland </p>
                                                </div>
                                            </div>
                                        </li>                                                    
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col-12 s6">
                                                    <p class="collections-title font-weight-600"> Description</p>
                                                    <p><small>Lorem ipsum dolor sit amet consestuer adicpising</small> </p>
                                                    <p><small>Lorem ipsum dolor sit amet consestuer adicpising</small> </p>
                                                    <p><small>Lorem ipsum dolor sit amet consestuer adicpising</small> </p>
                                                    <p><small>Lorem ipsum dolor sit amet consestuer adicpising</small> </p>
                                                </div>
                                            </div>
                                        </li>                                                    
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col-12 s6">
                                                    <p class="collections-title font-weight-600 mb-3"> Image</p>
                                                    <div class="masonry-gallery-wrapper">
                                                        <div class="popup-gallery">
                                                            <div class="gallery-sizer"></div>
                                                            <a href="app-assets/images/gallery/3.png">
                                                                <img width="100" src="app-assets/images/gallery/3.png" class="responsive-img" alt="">
                                                            </a>
                                                            <a href="app-assets/images/gallery/3.png">
                                                                <img width="100" src="app-assets/images/gallery/3.png" class="responsive-img" alt="">
                                                            </a>
                                                            <a href="app-assets/images/gallery/3.png">
                                                                <img width="100" src="app-assets/images/gallery/3.png" class="responsive-img" alt="">
                                                            </a>
                                                            <a href="app-assets/images/gallery/3.png">
                                                                <img width="100" src="app-assets/images/gallery/3.png" class="responsive-img" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m9 l9">
                        <div class="col-12 s12">
                            <p class="card-title mt-3">Order Details</p>
                            <table class="responsive-table">
                                <thead>
                                    <tr>
                                        <th data-field="id">#</th>
                                        <th data-field="name">Order Date</th>
                                        <th data-field="name">Order ID</th>
                                        <th data-field="name">Client Name</th>
                                        <th data-field="name">Price</th>
                                        <th data-field="name">Discount</th>
                                        <th data-field="name">Qty.</th>
                                        <th data-field="name">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>06 Jan, 2020</td>
                                        <td>Roshan Singh</td> 
                                        <td>pd5222</td>                                                    
                                        <td>Rs 2545</td>
                                        <td>10%</td>
                                        <td>1</td>
                                        <td>
                                            <a href="order-details.php" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>06 Jan, 2020</td>
                                        <td>Roshan Singh</td> 
                                        <td>pd5222</td>                                                    
                                        <td>Rs 2545</td>
                                        <td>10%</td>
                                        <td>1</td>
                                        <td>
                                            <a href="order-details.php" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>06 Jan, 2020</td>
                                        <td>Roshan Singh</td> 
                                        <td>pd5222</td>                                                    
                                        <td>Rs 2545</td>
                                        <td>10%</td>
                                        <td>1</td>
                                        <td>
                                            <a href="order-details.php" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>06 Jan, 2020</td>
                                        <td>Roshan Singh</td> 
                                        <td>pd5222</td>                                                    
                                        <td>Rs 2545</td>
                                        <td>10%</td>
                                        <td>1</td>
                                        <td>
                                            <a href="order-details.php" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>06 Jan, 2020</td>
                                        <td>Roshan Singh</td> 
                                        <td>pd5222</td>                                                    
                                        <td>Rs 2545</td>
                                        <td>10%</td>
                                        <td>1</td>
                                        <td>
                                            <a href="order-details.php" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col s12">
                            <ul class="pagination center">
                                <li class="disabled">
                                    <a href="#!"><i class="material-icons">chevron_left</i></a>
                                </li>
                                <li class="active"><a href="#!">1</a></li>
                                <li class="waves-effect"><a href="#!">2</a></li>
                                <li class="waves-effect">
                                    <a href="#!"><i class="material-icons">chevron_right</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection