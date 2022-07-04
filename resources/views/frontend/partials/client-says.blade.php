@if(!$testimonials->isEmpty())
<div class="bg-white-gradient-top-bottom pt-0 mt-40">

    <div class="bg-gradient-top"></div>
    <div class="bg-gradient-bottom"></div>

    <div class="bg-image pv-100 overlay-relative" style="background-image:url('{{ url('/') }}/frontend/images/image-bg/28.jpg');">

        <div class="overlay-holder overlay-white opacity-8"></div>

        <div class="container">

            <div class="testimonial-grid-slick-carousel testimonial-grid-wrapper">

                <div class="testimonial-grid-arrow">
                    <ul>
                        <li class="testimonial-grid-prev"><button><span>previuos</span></button></li>
                        <li class="testimonial-grid-next"><button><span>next</span></button></li>
                    </ul>
                </div>

                <div class="slick-carousel-wrapper gap-50">

                    <div class="slick-carousel-outer">

                        <div class="slick-carousel-inner">

                            <div class="slick-testimonial-grid-arrows">
                                @foreach ($testimonials as $testimonial)
                                    <div class="slick-item">

                                        <div class="testimonial-grid-01">

                                            <div class="content">

                                                <p class="saying">
                                                    {{ $testimonial->client_review }}
                                                </p>

                                            </div>

                                            <div class="man clearfix">



                                                <div class="texting">
                                                    <h5>{{ $testimonial->client_name }}</h5>
                                                    <p class="text-muted testimonial-cite">Travel on {{ $testimonial->date->format('F Y') }}</p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="overlay-relative overlay-gradient gradient-white set-height-01">
        <div class="overlay-holder bottom"></div>
    </div>

</div>
@endif