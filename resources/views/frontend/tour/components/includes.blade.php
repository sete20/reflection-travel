<div id="detail-content-sticky-nav-04" class="fullwidth-horizon-sticky-section">
    @if($includes)
        <h4 class="heading-title">{{__("What's included")}}</h4>

        <ul class="list-icon-absolute what-included-list mb-30">
            <li>
                                        <span class="icon-font"><i
                                                class="elegent-icon-check_alt2 text-primary"></i> </span>
                <h6>{{__('Meals')}}</h6>
                <p>
                    {{ ($lunch) ? $lunch .' lunch'  : '' }}
                    {{ ($breakfast) ? '& ' .$breakfast. ' breakfast': '' }}
                    {{ ($dinner) ? '& ' . $dinner. ' dinners': '' }}
                </p>
            </li>
            @foreach($includes as $include)
                <li>
                    <span class="icon-font"><i class="elegent-icon-check_alt2 text-primary"></i> </span>
                    <h6>{{$include->name}}</h6>
                </li>
            @endforeach

        </ul>
    @endif
    @if($excludes)
    <h5>Not included</h5>

    <ul class="list-icon-absolute what-included-list mb-30">
        @foreach($excludes as $exclude)
            <li><span class="icon-font"><i class="elegent-icon-close_alt2 text-dark"></i> </span>
                <h6>{{$exclude->name}}</h6>
            </li>
        @endforeach
    </ul>
    @endif
    <div class="mb-50"></div>

</div>
