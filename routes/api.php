
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitrixWebhookController;


Route::post('/bitrix/incoming', [BitrixWebhookController::class, 'handle']);