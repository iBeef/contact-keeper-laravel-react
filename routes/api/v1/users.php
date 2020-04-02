<?php

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
Route::post('/', function() {
    return "Registers a user.";
});