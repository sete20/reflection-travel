@extends('frontend.layouts.app')

@section('content')
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <section class="page-wrapper page-detail">

            <div class="page-title border-bottom pt-25 mb-0 border-bottom-0">

                <div class="container">

                    <div class="row gap-15 align-items-center">

                        <div class="col-12 col-md-7">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-30">

                <div class="row gap-20 gap-lg-40">

                    <div class="col-12 col-lg-12">

                        <div class="content-wrapper">


                            <div class="section-title border-bottom w-100">
                                <div class="d-flex flex-column flex-sm-row align-items-lg-end">
                                    <div>
                                        <h2><span><span>Our</span> Blog</span></h2>
                                    </div>
                                    <div class="ml-sm-auto">

                                        <div class="sort-box mt-10 mt-sm-0">
                                            <div class="d-flex align-items-center sort-item">
                                                <label class="sort-label d-none d-sm-flex">Category:</label>
                                                <div class="sort-form">
                                                    <select class="chosen-the-basic form-control" tabindex="2">
                                                        @foreach ($blogCategories as $blogCategory)
                                                            @if (!$issetCategoryId)
                                                                <option {{ $loop->first ? 'selected' : '' }}
                                                                    value="{{ $blogCategory->id }}">
                                                                    {{ $blogCategory->name }}</option>
                                                            @else
                                                                <option
                                                                    {{ $blogCategory->id == request()->categroy_id ? 'selected' : '' }}
                                                                    value="{{ $blogCategory->id }}">
                                                                    {{ $blogCategory->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row equal-height cols-1 cols-sm-2 cols-lg-3 gap-20 mt-50">

                                @forelse($blog as $article)
                                    <div class="col">

                                        <article class="post-grid-01">

                                            <div class="image">
                                                <img src="{{ !empty($article->getFirstMediaUrl()) ? $article->getFirstMediaUrl() : '/frontend/images/image-post/07.jpg' }}"
                                                    alt="images" loading="lazy" />
                                            </div>
                                            <div class="content">
                                                <span
                                                    class="post-date text-muted">{{ $article->created_at->format('F d,Y') }}</span>
                                                <h4>{{ $article->title }}</h4>

                                                <a href="{{ route('blog.show', $article) }}" class="h6">Read
                                                    this <i class="elegent-icon-arrow_right"></i></a>
                                            </div>

                                        </article>

                                    </div>
                                @empty
                                    <p class="lead">There is no articles yet</p>
                                @endforelse
                            </div>
                            @if (!$blog->isEmpty())
                                <nav class="pager-wrappper mt-50">
                                    <ul class="pagination justify-content-center mb-0 pb-0">
                                        {!! $blog->links('pagination::bootstrap-4') !!}
                                    </ul>
                                </nav>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
    <!-- end Main Wrapper -->
@endsection
