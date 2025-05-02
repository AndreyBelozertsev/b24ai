<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessIncomingMessage;

class BitrixWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('data.message.text');
        $dialogId = $request->input('data.dialog_id');
        dispatch(new ProcessIncomingMessage($message, $dialogId));
    }
}
