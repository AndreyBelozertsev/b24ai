<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessIncomingMessage;
use Illuminate\Support\Facades\Log;

class BitrixWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('data.message.text');
        $dialogId = $request->input('data.dialog_id');
        Log::info('Request logged:', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_data' => $request->all(),
        ]);
        //dispatch(new ProcessIncomingMessage($message, $dialogId));
    }
}
