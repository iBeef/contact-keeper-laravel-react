<?php

/*
|--------------------------------------------------------------------------
| Transactions API Routes
|--------------------------------------------------------------------------
*/

/**
 * Register a user
 * 
 * @route POST api/v1/auth
 * @access private
 */
Route::get('/', function() {
    return "Get logged in user";
});

/**
 * Auth user and get token
 * 
 * @route POST api/v1/auth
 * @access public
 */
Route::post('/', 'AuthController@login');