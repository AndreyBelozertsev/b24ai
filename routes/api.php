
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitrixAppController;
use App\Http\Controllers\AuthBitrixController;
use App\Http\Controllers\BitrixWebhookController;


Route::post('/bitrix/incoming', [BitrixWebhookController::class, 'handle']);

Route::post('/b24/install', [BitrixAppController::class, 'install']);

Route::post('/b24/index', [BitrixAppController::class, 'index']);

Route::post('/b24/oauth/callback', [AuthBitrixController::class, 'callback']);



