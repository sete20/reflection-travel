<div class="clear mb-100"></div>

<div class="section-title">
    <h2><span><span>Top</span> Categories</span></h2>
</div>


<div class="row cols-1 cols-sm-2 cols-lg-4 gap-2 mb-20">

    @foreach ($topCategories as $topCategory)
        <div class="col">

            <figure class="destination-grid-item-01">
                <a href="#">
                    <div class="image">
                        <img src="{{ $topCategory->getFirstMediaUrl() ?? url('/') }}/frontend/images/image-destination/01.jpg"
                            alt="image" />
                    </div>
                    <figcaption class="content">
                        <h5>{{ $topCategory->name }}</h5>
                        <p class="text-muted">{{ $topCategory->tours_count }} Tours</p>
                    </figcaption>
                </a>
            </figure>
        </div>
    @endforeach

</div>
