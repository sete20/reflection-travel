<div id="detail-content-sticky-nav-02" class="fullwidth-horizon-sticky-section">

    <h4 class="heading-title">{{__('Itinerary')}}</h4>

    <p>{{$tour->itinerary?->name}}</p>
    <div id="accordion">
        @if($tour->itinerary?->days()->count() > 0)
        @foreach($tour->itinerary?->days as $key => $day)

            <div class="card">
                <div class="card-header" id="heading-{{$day->id}}">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-{{$day->id}}" aria-expanded="false" aria-controls="collapse-{{$day->id}}">
                            {{__('Day')}} {{$key+1}} {{$day->name}}
                        </button>
                    </h5>
                    <p>{{$day->steps->count()}} {{__('Steps')}} </p>
                </div>
                <div id="collapse-{{$day->id}}" class="collapse " aria-labelledby="heading-{{$day->id}}" data-parent="#accordion">
                    <div class="card-body">

                        <div class="apland-timeline-area">
                            <!-- Single Timeline Content-->
                            @foreach($day->steps as $key => $step)

                                <div class="single-timeline-area">
                                    <div class="timeline-date">
                                        <p>{{$key +1 }} - </p>
                                    </div>
                                    <div class="single-timeline-content d-flex ">
                                        <div class="timeline-text">
                                            <h6>{{$step->step->name}}</h6>
                                            <p>{{$step->step->body}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>

    <div class="mb-50"></div>

</div>
