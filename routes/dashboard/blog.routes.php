<?php

route_group('blog', function () {

    Route::resources([
        'blogs' => 'BlogController',
        'blog-cats' => 'BlogCatController',
        'blog-sub-categories' => 'BlogSubCategoryController',
        'blog-links' => 'BlogLinkController',
        'blog-sections' => 'BlogSectionController',
    ]);
});
