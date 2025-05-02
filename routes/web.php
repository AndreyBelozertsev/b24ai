<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitrixWebhookController;

Route::get('/', function () {
    return view('welcome');
});
