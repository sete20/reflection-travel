<?php

route_group('core', function () {
    Route::post('select-model-ajax', 'GeneralController@ModelSelectAjax')->name('select-model-ajax');
    Route::post('select-model-ajax/{id}', 'GeneralController@SelectedModel')->name('selected-model-ajax');
    Route::post('select-multi-model-ajax', 'GeneralController@MultiSelectedChecked')->name('selected-multi-model-ajax');
    Route::post('selected-relation-model-ajax/{id}', 'GeneralController@SelectedRelationModel')->name('selected-relation-model-ajax');
    route_group('administration', function () {
        Route::get('profile', 'AdminProfileController@index')->name('profile');
        Route::put('profile', 'AdminProfileController@update');

        Route::resources([
            'admins' => 'AdminController',
            'roles'  => 'RoleController',
        ]);
    });

    Route::resources([
        'pages' => 'PageController',
        'cities' => 'CityController',
        'emails' => 'EmailController',
        'galleries' => 'GalleryController',
        'categories' => 'CategoryController',
    ]);
    Route::get('save', 'SaveController')->name('save-all');

});
