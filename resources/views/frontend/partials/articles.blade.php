<section class="pt-40 pb-100">

    <div class="container">

        <div class="section-title">
            <h2><span><span>Travel</span> Articles</span></h2>
        </div>

        <div class="post-grid-wrapper-01">

            <div class="row equal-height cols-1 cols-sm-2 cols-md-3 gap-10 gap-md-20 mb-40">
                @foreach ($travelArticles as $article)
                    <div class="col">

                        <article class="post-grid-01">

                            <div class="image">
                                <img {{ $article->getFirstMediaUrl() }}
                                    src="{{ !empty($article->getFirstMediaUrl())? $article->getFirstMediaUrl(): asset('frontend/images/image-regular/08.jpg') }}"
                                    alt="images" />
                            </div>
                            <div class="content">
                                <span class="post-date text-muted">{{ $article->created_at->format('d F, Y') }}</span>
                                <h4>{{ $article->title }}</h4>
                                <a href="{{ route('blog.show', $article) }}" class="h6">Read this <i
                                        class="elegent-icon-arrow_right"></i></a>
                            </div>

                        </article>

                    </div>
                @endforeach

            </div>

        </div>

    </div>
</section>
