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
Route::middleware('jwt.verify')->get('/', 'AuthController@show');

/**
 * Auth user and get token
 * 
 * @route POST api/v1/auth
 * @access public
 */
Route::post('/', 'AuthController@login');