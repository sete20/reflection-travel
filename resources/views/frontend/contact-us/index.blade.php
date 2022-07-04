@extends('frontend.layouts.app')

@section('content')
<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

    <section class="page-wrapper page-result pb-0">
    
        <div class="page-title bg-light mb-0">
        
            <div class="container">
            
                <div class="row gap-15 align-items-center">
                
                    <div class="col-12 col-md-7">
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                        
                        <h4 class="mt-0 line-125">Contact</h4>
                        
                    </div>
                    
                </div>
        
            </div>
            
        </div>
        
        <div class="container pv-60">

            <div class="map-contact-wrapper">
            
                <div id="map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 500px;"></div>
        
                <div class="infobox-wrapper contact-infobox">
                    <div id="infobox">
                        <div class="infobox-address">
                            <h6>We Are Here</h6>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <div class="mb-50"></div>
            
            <div class="row gap-50 gap-lg-0">
            
                <div class="col-12 col-lg-5 col-xl-4">
                
                    <h4 class="heading-title"><span>Drop us <span class="font200">a message:</span></span></h4>
                    
                    <form id="contact-form" method="post" action="{{route('contact_us')}}">

                        <div class="contact-successful-messages"></div>

                        <div class="contact-inner">
                            <div class="form-group">
                                <label for="form_name">Full Name *</label>
                                <input value="{{ old('name') }}" id="form_name" type="text" name="full_name" class="form-control" required="required" data-error="Your name is required.">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="form_email">Email Address *</label>
                                <input value="{{ old('email') }}" id="form_email" type="email" name="email" class="form-control" required="required" data-error="Valid email is required.">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="form_subject">Subject</label>
                                <input value="{{ old('subject') }}" id="form_subject" type="text" name="subject" class="form-control" required="required" data-error="The subject field is required.">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control" rows="7s" required="required" data-error="Please,leave us a message.">{{ old('message') }}</textarea>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                            
                            <input type="submit" class="btn btn-primary btn-send btn-wide mt-15" value="Send message">
                            
                        </div>

                    </form>
                    
                </div>
                
                <div class="col-12 col-lg-6 ml-auto">
                
                    <h4 class="heading-title"><span>Contact <span class="font200">information:</span></span></h4>
                    <p class="post-heading">Excited him now natural saw passage offices you minuter. At by asked being court hopes</p>
                    
                    <ul class="contact-list-01">
                
                        <li>
                            <span class="icon-font"><i class="ion-android-pin"></i></span>
                            <h6>Address</h5>
                            545, Marina Rd.,<br/>Mohammed Bin Rashid Boulevard,<br/>Dubai 123234 
                        </li>
                        
                        <li>
                            <span class="icon-font"><i class="ion-android-mail"></i></span>
                            <h6>Email</h5>
                            <a href="#">office@company.com</a>
                        </li>
                        
                        <li>
                            <span class="icon-font"><i class="ion-android-call"></i></span>
                            <h6>Phone</h5>
                            1-866-599-6674
                        </li>
                        
                        <li>
                            <span class="icon-font"><i class="ion-android-print"></i></span>
                            <h6>Fax</h5>
                            (123) 254-8547
                        </li>
                    
                    </ul>
                    
                    <div class="mb-50"></div>
                    
                    <h4 class="heading-title"><span>Find <span class="font200">us on:</span></span></h4>
                    
                    <div class="social-btns-01">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fab fa-google-plus "></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Codepen"><i class="fab fa-codepen"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fab fa-behance"></i></a>
                    </div>
                    
                </div>
            
            </div>
            
        </div>
    
    </section>
    
</div>		
<!-- end Main Wrapper -->
@endsection
@push('scripts')
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
	<script type="text/javascript" src="{{asset('frontend/js/plugins/infobox.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/js/custom-contact-page.js')}}"></script>
@endpush
