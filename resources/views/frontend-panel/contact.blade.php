@extends('layouts.frontend_layout')
@section('content')
        <div class="holder fullboxed mt-0 py-5 py-md-10 bg-cover" style="background-image:url(public/assets/images/contact.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <div class="text-center">
                           <!--  <p><img src="public/assets/images/contact.png" alt="" class="img-fluid"></p> -->
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fullboxed py-3 py-lg-3 holder-bg-01">
            <div class="container">
            <h3 class="text-center f-30">We would like to hear from you! </h3>
            <p class="text-center">Lorem Ipsum is simply dummy text of the printing and< typesetting industry.<br> Lorem Ipsum has been Lorem Ipsum has been  Lorem Ipsum has been Lorem Ipsum has been </p>
                <div class="row vert-margin-double justify-content-center mt-4">
                    <div class="col-sm-6 col-lg-3 offset-lg-1">
                        <h2>Kokomo Resort wear</h2>
                        <div class="contact-info  offset-lg-1">
                            <div class="contact-info-text "><a href="mailto:info@kokomo.com"></a><img width="27" class="pr-1" src="public/assets/images/footer/4.png">info@kokomo.com</div>
                        </div>
                        <div class="contact-info offset-lg-1">
                            <div class="contact-info-text "><a href="mailto:sales@kokomo.com"></a><img width="27" class="pr-1" src="public/assets/images/footer/4.png">sales@kokomo.com</div>
                        </div>
                        <div class="contact-info offset-lg-1">
                            <div class="contact-info-text "><img width="27" class="pr-1" src="public/assets/images/footer/3.png">+91-9999553377</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 offset-lg-1 border-left">
                        <form data-toggle="validator" class="contact-form pl-4" id="contactForm">
                            <div class="form-confirm">
                                <div class="success-confirm text-center">Thanks! Your message has been sent.<br>We will get back to you soon!</div>
                                <div class="error-confirm text-center">Oops! There was an error submitting form.<br>Refresh and send again.</div>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" name="name" class="form-control" data-required-error="Please fill the field" placeholder="Name" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                               <input type="text" placeholder="Email Address" name="email" class="form-control" data-error="Error, that email address is invalid" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                
                                <textarea class="form-control textarea--height-100" placeholder="MESSAGE" name="message" data-required-error="Please fill the field" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div><button class="btn mt-1 btn-new-bg">Send</button>
                        </form>
                    </div>
                </div>              
            </div>
        </div>     
@endsection