<?php

route_group('day', function () {
    Route::resources([
        'days' => 'DayController',
    ]);
});
