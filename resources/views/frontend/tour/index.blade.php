@extends('frontend.layouts.app')

@section('content')
    <!-- start Body Inner -->
    <div class="body-inner">

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
                                        <li class="breadcrumb-item"><a href="#">Page</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Page Title by Heading Two</li>
                                    </ol>
                                </nav>

                                <h4 class="mt-0 line-125">36 Tour Packages in Thailand</h4>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container">

                    <div class="row equal-height gap-30 gap-lg-40">

                        @include('frontend.tour.components.search-bar')

                        <div class="col-12 col-lg-8">

                            <div class="content-wrapper pv">

                                <div class="d-flex justify-content-between flex-row align-items-center sort-group page-result-01">
                                    <div class="sort-box">
                                        <div class="d-flex align-items-center sort-item">
                                            <label class="sort-label d-none d-sm-flex">Sort by:</label>
                                            <div class="sort-form">
                                                <select class="chosen-the-basic form-control" tabindex="2">
                                                    <option value="sort-by-1">Name: A to Z</option>
                                                    <option value="sort-by-2">Name: Z to A</option>
                                                    <option value="sort-by-3">Price: Hight to Low</option>
                                                    <option value="sort-by-4">Price: Low to High</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row equal-height cols-1 cols-sm-2 gap-20 mb-25">

                                    @foreach($tours as $tour)
                                        <div class="col">

                                            <figure class="tour-grid-item-01">

                                                <a href="{{route('tour.single',['id'=>$tour->id,'title'=>str_slug($tour->name,'-')])}}">

                                                    <div class="image">
                                                        <img src="{{asset('/frontend/images/image-regular/01.jpg')}}" alt="images" />
                                                    </div>

                                                    <figcaption class="content">
                                                        <h5>{{$tour->name}}</h5>
                                                        <ul class="item-meta">
                                                            <li>
                                                                <i class="elegent-icon-pin_alt text-warning"></i> Egypt
                                                            </li>
                                                            <li>
                                                                <div class="rating-item rating-sm rating-inline clearfix">
                                                                    <div class="rating-icons">
                                                                        <input type="hidden" class="rating" data-filled="rating-icon ri-star rating-rated" data-empty="rating-icon ri-star-empty" data-fractions="2" data-readonly value="4.5"/>
                                                                    </div>
                                                                    <p class="rating-text font600 text-muted font-12 letter-spacing-1">26 reviews</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <ul class="item-meta mt-15">
                                                            <li>
                                                                <span class="font700 h6">
                                                                    {{$tour->TourDays() }} {{__('Days')}}
                                                                    @if($tour->TourDays() > 1)
                                                                        &amp; {{ $tour->TourDays() -1 }}  {{__('Nights')}}
                                                                    @endif
                                                                </span>
                                                            </li>
                                                            <li>
                                                                {{__('Start')}}: <span class="font600 h6 line-1 mv-0"> {{$tour->CityFrom?->name}}</span> - {{__('End')}}: <span class="font600 h6 line-1 mv-0"> {{$tour->CityTo?->name}}</span>
                                                            </li>
                                                        </ul>
                                                        <p class="mt-3">Price from <span class="h6 line-1 text-primary font16">$125.99</span> <span class="text-muted mr-5"></span></p>
                                                    </figcaption>

                                                </a>

                                            </figure>

                                        </div>
                                    @endforeach

                                </div>

                                <div class="pager-wrappper mt-40">

                                    <div class="pager-innner">

                                        <div class="row align-items-center text-center text-lg-left">

                                            <div class="col-12 col-lg-5">
                                                Showing reslut 1 to 15 from 248
                                            </div>

                                            <div class="col-12 col-lg-7">
                                                <nav class="float-lg-right mt-10 mt-lg-0">
                                                    <ul class="pagination justify-content-center justify-content-lg-left">
                                                        <li>
                                                            <a href="#" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                            </a>
                                                        </li>
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><span>...</span></li>
                                                        <li><a href="#">11</a></li>
                                                        <li><a href="#">12</a></li>
                                                        <li><a href="#">13</a></li>
                                                        <li>
                                                            <a href="#" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>
        <!-- end Main Wrapper -->

    </div>
    <!-- end Body Inner -->
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('frontend/js/custom-multiply-sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/custom-core.js')}}"></script>
@endpush
