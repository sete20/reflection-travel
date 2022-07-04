<div class="clear mb-100"></div>

<div class="section-title">
    <h2><span><span>Best</span> Tour Packages</span></h2>
</div>

<div class="row equal-height cols-1 cols-sm-2 cols-lg-3 gap-20 mb-30">
    @foreach ($topTours as $tour)
        <div class="col">

            <figure class="tour-grid-item-01">

                <a href="{{ route('tour.single', [$tour->id, $tour->title]) }}">

                    <div class="image">
                        <img src="{{ url('/') }}/frontend/images/image-tour/01.jpg" alt="images" />
                    </div>

                    <figcaption class="content">
                        <h5>{{ $tour->name }}</h5>
                        <ul class="item-meta">
                            <li>
                                <i class="elegent-icon-pin_alt text-warning"></i> {{ $tour->CityFrom->name }}
                            </li>
                            <li>
                                <div class="rating-item rating-sm rating-inline clearfix">
                                    <div class="rating-icons">
                                        <input type="hidden" class="rating"
                                            data-filled="rating-icon ri-star rating-rated"
                                            data-empty="rating-icon ri-star-empty" data-fractions="2" data-readonly
                                            value="4.5" />
                                    </div>
                                    <p class="rating-text font600 text-muted font-12 letter-spacing-1">26 reviews</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="item-meta mt-15">
                            <li><span class="font700 h6">{{ $tour->TourDays() }}</span></li>
                            <li>
                                Start: <span class="font600 h6 line-1 mv-0"> {{ $tour->CityFrom->name }}</span> - End:
                                <span class="font600 h6 line-1 mv-0"> {{ $tour->CityTo->name }}</span>
                            </li>
                        </ul>
                        <p class="mt-3">Price from <span class="h6 line-1 text-primary font16">$125.99</span>
                            <span class="text-muted mr-5"></span>
                        </p>
                    </figcaption>

                </a>

            </figure>

        </div>
    @endforeach


</div>
