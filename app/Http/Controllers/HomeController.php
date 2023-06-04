<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->product = new Product;
    }

    public function index()
    {
        $productData = $this->product->store();

        $resData = [];
        foreach ($productData as $product) {
            $resData[] = [
                "id" => $product->id,
                "name" => $product->name,
                "sku" => $product->sku,
                "type" => TransformerController::convertProductType($product->type),
                "description" => $product->description,
                "price" => intval($product->price),
                "stock" => $product->stock,
                "status" => TransformerController::convertProductStatus($product->status)
            ];
        }

        return view("home", ["productData" => $resData]);
    }

    public function detail(int $productId = -1)
    {
        $product = $this->product->single($productId);
        $product['type'] = TransformerController::convertProductType($product['type']);
        $product['status'] = TransformerController::convertProductStatus($product['status']);

        return view("product/detail", ["product" => $product]);
    }
}
