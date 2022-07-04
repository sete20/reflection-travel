<?php

route_group('user', function () {

    Route::resources([
        'users' => 'UserController',
        'questions' => 'QuestionController',
    ]);

    Route::get('contact-messages','ContactMessageController@index')->name('contact-messages.index');
    Route::delete('contact-messages/{id}','ContactMessageController@destroy')->name('contact-messages.destroy');

});
