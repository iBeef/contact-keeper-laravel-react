<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Transactions API Routes
|--------------------------------------------------------------------------
*/

/**
 * Register a user
 * 
 * @route POST api/v1/users
 * @access public
 */
Route::post('/', 'UsersController@store');