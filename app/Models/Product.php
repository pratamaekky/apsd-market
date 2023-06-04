<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'type'
    ];

    protected $hidden = [
        'created'
    ];

    public function store(int $type = -1)
    {
        $product = $this;

        if ($type > 0)
            $product = $product->where('type', $type);

        $product = $product->orderBy('name', 'ASC');
        $product = $product->get();
        return $product;
    }

    public function single(int $id = 0)
    {
        $product = $this->where('id', $id)->first();

        return $product;
    }

}
