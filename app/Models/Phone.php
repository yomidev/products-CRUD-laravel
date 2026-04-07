<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = [
        'phone_number',
        'id_customer'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
