<?php

route_group('core-tour', function () {

    Route::resources([
        'attendants' => 'AttendantController',
        'includes-model' => 'IncludeModelController',
        'excludes' => 'ExcludeController',
        'faqs' => 'FaqController',
        'faq-links' => 'FaqLinkController',
        'highlights' => 'HighlightController',
        'highlight-links' => 'HighlightLinkController',
        'permits' => 'PermitController',
        'places' => 'PlaceController',
        'tips' => 'TipController',
        'tip-links' => 'TipLinkController',
        'transports' => 'TransportController',
        'meals' => 'MealController',
        'airports' => 'AirportController',
        'testimonials' => 'TestimonialController',
    ]);
});
