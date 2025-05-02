<?php 

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PaymentDocumentService
{
    public function generatePdf()
    {
        $data = [
            'company' => 'ООО "Рога и Копыта"',
            'inn' => '1234567890',
            'kpp' => '123456789',
            'bank' => 'ПАО Банк',
            'bik' => '044525225',
            'account' => '40702810900000000001',
        ];

        $pdf = Pdf::loadView('pdf.requisites', $data);

        $path = storage_path('app/public/requisites.pdf');
        $pdf->save($path);

        return $path;
    }
}