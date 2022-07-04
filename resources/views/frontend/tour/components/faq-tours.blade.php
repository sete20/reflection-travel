<div id="detail-content-sticky-nav-06" class="fullwidth-horizon-sticky-section">

    <h4 class="heading-title">{{__('FAQ')}}</h4>

    <div class="faq-item-long-wrapper">

        @foreach($tour->faqs as $faq)
            <div class="faq-item-long">

                <div class="row">

                    <div class="col-12 col-md-4 col-lg-3">

                        <div class="col-inner">
                            <h6>{{$faq->question}}</h6>
                        </div>

                    </div>

                    <div class="col-12 col-md-8 col-lg-9">

                        <div class="col-inner">
                            <p class="font-lg">
                                {{$faq->answer}}
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        @endforeach

    </div>

    <div class="row mt-25">

        <div class="col-12 col-md-8 col-lg-9 offset-md-4 offset-lg-3">

            <div class="col-inner">
                <a href="#" class="btn btn-primary btn-wide">Ask q question</a>
            </div>

        </div>

    </div>

    <div class="mb-50"></div>

</div>
