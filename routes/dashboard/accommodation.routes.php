<?php

route_group('accommodation', function () {

    Route::resources([
        'accommodations' => 'AccommodationController',
        'accommodation-prices' => 'AccommodationPriceController',
        'accommodation-views' => 'AccommodationViewController',
        'views' => 'ViewController',
    ]);
});
