<?php

/*
|--------------------------------------------------------------------------
| Transactions API Routes
|--------------------------------------------------------------------------
*/

/**
 * Get all users contacts
 * 
 * @route GET api/v1/contacts
 * @access private
 */
Route::get('/', function() {
    return "Get all contacts.";
});

/**
 * Add new contact
 * 
 * @route POST api/v1/contacts
 * @access private
 */
Route::post('/', function() {
    return "Add a contact";
});

/**
 * Update a contact
 * 
 * @route PUT api/v1/contacts/{id}
 * @access private
 */
Route::put('/{id}', function($id) {
    return "Update contact";
});

/**
 * Delete a contact
 * 
 * @route DELETE api/v1/contacts/{id}
 * @access private
 */
Route::delete('/{id}', function($id) {
    return "Delete contact";
});