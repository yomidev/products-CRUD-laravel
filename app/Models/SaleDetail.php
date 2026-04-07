<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'details_sales';

    protected $fillable = [
        'id_sale',
        'id_product',
        'quantity',
        'subtotal',
    ];

    public function sale(){
        return $this->belongsTo(Sale::class, 'id_sale');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product');
    }
}
