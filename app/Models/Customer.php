<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'firstname',
        'lastname',
        'email'
    ];

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
