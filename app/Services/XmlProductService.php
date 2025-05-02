<?php 

namespace App\Services;

use App\Models\Product;

class XmlProductService
{
    public function importFromXml(string $path)
    {
        $xml = simplexml_load_file($path);

        foreach ($xml->product as $item) {
            Product::updateOrCreate([
                'avito_id' => (string)$item->avito_id,
            ], [
                'name' => (string)$item->name,
                'price' => (float)$item->price,
                'in_stock' => ((int)$item->stock > 0),
                'description' => (string)$item->description,
                'params' => json_encode((array)$item->params),
            ]);
        }
    }
}