<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            "category_id" => $row[0],
            "brand_id" => $row[1],
            "desc" => $row[2],
            "content" => $row[3],
            "price" => $row[4],
            "image" => $row[5],
            "name" => $row[6],
            "status" => $row[7],
            "qty" => $row[8],
        ]);
    }
}
