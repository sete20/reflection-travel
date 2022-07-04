<?php

route_group('itinerary', function () {

    Route::resources([
        'itineraries' => 'ItineraryController',
        'itinerary-weeks' => 'ItineraryWeekController',
    ]);
});
