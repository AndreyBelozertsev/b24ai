<?php 


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\XmlProductService;

class ImportProductsFromXml extends Command
{
    protected $signature = 'products:import-xml';
    protected $description = 'Import products from XML file';

    public function handle(XmlProductService $service)
    {
        $path = storage_path('app/products.xml');
        $service->importFromXml($path);

        $this->info('Products imported successfully');
    }
}