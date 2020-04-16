<?php

/*
|--------------------------------------------------------------------------
| Transactions API Routes
|--------------------------------------------------------------------------
*/

/**
 * Contact routes
 * 
 * @route GET api/v1/contacts
 * @route POST api/v1/contacts
 * @route PUT api/v1/contacts/{$id}
 * @route DELETE api/v1/contacts/{$id}
 * @access private
 */
Route::resource('/', 'ContactController', [
    'except' => ['show', 'edit', 'create', 'update', 'destroy']
]);

Route::resource('/', 'ContactController',
    [
        'parameters' => ['' => 'id'],
        'only' => ['update', 'destroy']
    ],
)->middleware('ownership.contact');