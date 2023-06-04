<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Http\Controllers\TransformerController;

class ProductController extends Controller
{
    //
    public $productData;

    public function __construct()
    {
        $this->product = new Product;
    }
    public function index()
    {
        $productData = $this->product->store();

        $resData = [];

        // dd($productData);
        foreach ($productData as $product) {
            $resData[] = [
                "name" => $product->name,
                "type" => TransformerController::convertProductType($product->type),
                "description" => $product->description,
                "price" => intval($product->price),
                "stock" => $product->stock
            ];
        }

        return $resData;
        // dd($product);
    }

    public function data()
    {
        $productData = $this->product->store();

        $resData = [];

        foreach ($productData as $product) {
            $resData[] = [
                "name" => $product->name,
                "type" => TransformerController::convertProductType($product->type),
                "description" => $product->description,
                "price" => intval($product->price),
                "stock" => $product->stock
            ];
        }

        return response()->json([
            "status" => true,
            "message" => "Product Data",
            "data" => $resData
        ], 200);
    }
}
