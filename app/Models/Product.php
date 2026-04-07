<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'stock',
        'id_category',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function saleDetails(){
        return $this->hasMany(SaleDetail::class);
    }

}
