<?php

namespace App\Jobs;

use App\Models\Product;
use App\Services\OpenAIService;
use App\Services\Bitrix24Service;
use Illuminate\Queue\SerializesModels;
use App\Services\PaymentDocumentService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

//class ProcessIncomingMessage implements ShouldQueue
class ProcessIncomingMessage

{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $message;
    public $dialogId;
    public $comment;

    public function __construct($message, $dialogId, $comment = '')
    {
        $this->message = $message;
        $this->dialogId = $dialogId;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Проверка на запрос реквизитов
        if (str_contains(strtolower($this->message), 'реквизиты')) {
            $pdfPath = app(PaymentDocumentService::class)->generatePdf();
            app(Bitrix24Service::class)->sendFile($this->dialogId, $pdfPath, 'Реквизиты для оплаты.pdf');
            return;
        }

        // Попытка определить avito_id из комментария
        preg_match('/ID[:\s#]*([0-9]+)/i', $this->comment, $matches);
        $avitoId = $matches[1] ?? null;

        if ($avitoId) {
            $product = Product::where('avito_id', $avitoId)->first();
        } else {
            $product = Product::where('name', 'LIKE', "%{$this->message}%")->first();
        }

        $context = $product
            ? "Товар: {$product->name}, Цена: {$product->price}, В наличии: " . ($product->in_stock ? 'да' : 'нет')
            : "Товар не найден в базе. Уточните, пожалуйста, модель или артикул.";

        $reply = app(OpenAIService::class)->replyToMessage($this->message, $context);

        app(Bitrix24Service::class)->sendMessage($this->dialogId, $reply);
    }
}
