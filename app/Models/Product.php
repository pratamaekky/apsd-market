<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'stock',
        'status'
    ];

    public function store()
    {
        $product = $this->all();

        return $product;
    }
}
