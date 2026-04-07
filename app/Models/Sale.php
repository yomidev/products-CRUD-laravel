<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'id_customer',
        'date',
        'total',
        'status'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function details(){
        return $this->hasMany(SaleDetail::class);
    }
}
