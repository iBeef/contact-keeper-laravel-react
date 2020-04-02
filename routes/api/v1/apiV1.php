<?php

/*
|--------------------------------------------------------------------------
| Transactions API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('auth')
    ->namespace('Api\v1')
    ->group(base_path('routes/api/v1/auth.php'));

Route::prefix('contacts')
    ->namespace('Api\v1')
    ->group(base_path('routes/api/v1/contacts.php'));

Route::prefix('users')
    ->namespace('Api\v1')
    ->group(base_path('routes/api/v1/users.php'));