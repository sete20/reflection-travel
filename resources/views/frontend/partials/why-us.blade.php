<div class="row cols-1 cols-lg-3 gap-20 gap-lg-40">
    @foreach ($benfits as $benfit)
        <div class="col">
            <div class="featured-icon-horizontal-01 clearfix">
                <div class="icon-font">
                    {{-- <i class="elegent-icon-gift_alt text-primary"></i> --}}
                    <img src="{{ $benfit->getFirstMediaUrl() }}" alt="{{ $benfit->title }}">
                </div>
                <div class="content">
                    <h6>{{ $benfit->title }}</h6>
                    <p class="text-muted">{{ $benfit->subtitle }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>