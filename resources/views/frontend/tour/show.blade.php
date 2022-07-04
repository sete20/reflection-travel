@extends('frontend.layouts.app')

@section('content')
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <section class="page-wrapper page-detail">

            <div class="page-title bg-light">

                <div class="container">

                    <div class="row gap-15 align-items-center">

                        <div class="col-12 col-md-7">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">{{$tour->CityFrom?->name}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$tour->name}}</li>
                                </ol>
                            </nav>

                        </div>

                    </div>

                </div>

            </div>


            <div class="container pt-30">

                <div class="row gap-20 gap-lg-40">

                    <div class="col-12 col-lg-8">

                        <div class="content-wrapper">

                            <div id="detail-content-sticky-nav-01" class="detail-header mb-30">
                                <h3>{{$tour->name}}</h3>

                                <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-20">
                                    <div class="mr-15 font-lg">
                                        {{__('From')}}: <a href="#">
                                            <i class="elegent-icon-pin_alt text-warning"></i> {{$tour->CityFrom?->name}}
                                        </a>
                                        {{__('To')}}:
                                        <a href="#"><i
                                                class="elegent-icon-pin_alt text-warning"></i>{{$tour->CityTo?->name}}
                                        </a>
                                    </div>
                                    <div>
                                        <div class="rating-item rating-inline">
                                            <div class="rating-icons">
                                                <input type="hidden" class="rating"
                                                       data-filled="rating-icon ri-star rating-rated"
                                                       data-empty="rating-icon ri-star-empty" data-fractions="2"
                                                       data-readonly value="4.5"/>
                                            </div>
                                            <p class="rating-text font600 text-muted font-12 letter-spacing-1"><span
                                                    class="text-dark mr-3">4.5/5</span> 26 reviews</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="slick-gallery-slideshow detail-gallery mt-20 mb-40">

                                    <div class="slider gallery-slideshow">
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/01.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/02.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/03.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/04.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/05.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/06.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/07.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/08.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/09.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/10.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/11.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/12.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                    </div>
                                    <div class="slider gallery-nav">
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/01.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/02.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/03.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/04.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/05.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/06.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/07.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/08.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/09.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/10.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/11.jpg"
                                                    alt="Images"/></div>
                                        </div>
                                        <div>
                                            <div class="image"><img
                                                    src="{{asset('frontend/')}}/images/image-gallery/thumb/12.jpg"
                                                    alt="Images"/></div>
                                        </div>

                                    </div>

                                </div>

                                <ul class="list-inline-block highlight-list mt-30">
                                    <li>
											<span class="icon-font d-block">
												<i class="linea-icon-basic-chronometer"></i>
											</span>
                                        <strong>
                                            {{$tour->TourDays() }} {{__('Days')}}
                                            @if($tour->TourDays() > 1)
                                            <br/>{{ $tour->TourDays() -1 }}  {{__('Nights')}}
                                            @endif
                                        </strong>
                                    </li>
                                    <li>
											<span class="icon-font d-block">
												<i class="linea-icon-basic-flag1"></i>
											</span>
                                        {{__('Starting Point')}}:<br/><strong>{{$tour->CityFrom?->name}}</strong>
                                    </li>
                                    <li>
											<span class="icon-font d-block">
												<i class="linea-icon-basic-flag2"></i>
											</span>
                                        {{__('Ending Point')}}:<br/><strong>{{$tour->CityTo?->name}}</strong>
                                    </li>
                                    <li>
											<span class="icon-font d-block">
												<i class="linea-icon-ecommerce-dollar"></i>
											</span>
                                        From<br/><strong>{{$defaultPrice}}</strong> / person
                                    </li>
                                </ul>

                                <div class="mb-30"></div>
                                {!! $tour->description !!}
                                <h5 class="mt-30">{{__('What makes this tour very interesting')}}</h5>
                                {!! $tour->interesting !!}

                            </div>

                            <div class="mb-50"></div>

                           @include('frontend.tour.components.itinerary')

                            <div id="detail-content-sticky-nav-03" class="fullwidth-horizon-sticky-section">

                                <h4 class="heading-title">Map</h4>

                                <div id="gmap-8" style="height: 450px;"></div>

                                <div class="mb-50"></div>

                            </div>
                            @include('frontend.tour.components.includes')
                            {{--@include('frontend.tour.components.similar-tours')--}}
                            @include('frontend.tour.components.faq-tours')
                           {{--
                            @include('frontend.tour.components.reviews-tours')
                           --}}

                        </div>

                    </div>

                    <div class="col-12 col-lg-4">
                        @include('frontend.tour.components.booking')
                    </div>

                </div>

            </div>

        </section>

    </div>
    <!-- end Main Wrapper -->
@endsection

@push('scripts')
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22"></script>
    <script type="text/javascript" src="{{asset('frontend/js/plugins/maplace.min.js')}}"></script>

    <script>
        $(document).ready(function (e) {
            'use strict';


            var LocsD = [
                @if($places)
                    @foreach($places as $key => $place)
                    {
                        lat: '{{$place->latitude}}',
                        lon: '{{$place->longitude}}',
                        title: '{{$place->name}}',
                        html: '<h3>{{$place->name}}</h3>',
                        stopover: @if($key == 0) false @else true @endif,
                        icon: 'http://maps.google.com/mapfiles/marker{{chr(65+$key)}}.png',
                    },
                    @endforeach
                @endif

            ];


            new Maplace({
                locations: LocsD,
                map_div: '#gmap-8',
                generate_controls: false,
                show_markers: true,
                type: 'polyline',
                draggable: true,
                stroke_options: {
                    strokeColor: '#2929C0',
                    strokeOpacity: 1,
                    strokeWeight: 2,
                    fillColor: '#2929C0',
                    fillOpacity: 0.9
                },
            }).Load();
        });
    </script>

    <script type="text/javascript" src="{{asset('frontend/js/custom-multiply-sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/custom-core.js')}}"></script>
@endpush


