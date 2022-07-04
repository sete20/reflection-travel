<?php

route_group('step', function () {
    Route::resources([
        'steps' => 'StepController',
    ]);
});
