<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function replyToMessage($message, $context = '')
    {
        $response = Http::withOptions([
            'proxy' => 'http://127.0.0.1:12334', // или socks5://127.0.0.1:10808
        ])->withToken(config('services.openai.key'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => $context],
                    ['role' => 'user', 'content' => $message],
                ],
            ]);
        dd($response->body());
        return $response->json('choices.0.message.content');
    }
}