<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Bitrix24Service
{
    public function sendMessage($dialogId, $text)
    {
        $webhook = config('services.bitrix24.webhook');

        Http::post("https://yourdomain.bitrix24.ru/rest/{$webhook}/imbot.message.add", [
            'DIALOG_ID' => $dialogId,
            'MESSAGE' => $text,
        ]);
    }

    public function sendFile($dialogId, $filePath, $fileName)
    {
        $webhook = config('services.bitrix24.webhook');

        $file = fopen($filePath, 'r');

        $response = Http::attach('file', $file, $fileName)
            ->post("https://yourdomain.bitrix24.ru/rest/{$webhook}/imbot.message.add", [
                'DIALOG_ID' => $dialogId,
                'MESSAGE' => '[FILE]',
            ]);

        fclose($file);

        return $response;
    }
}