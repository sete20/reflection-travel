<?php

route_group('tour', function () {
    Route::resources([
        'tours' => 'TourController',
        'meals' => 'MaelController',
        'benfits' => 'BenfitController',
    ]);
});
