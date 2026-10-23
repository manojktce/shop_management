<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', env('ADMIN_PATH', 'webadmin'));
