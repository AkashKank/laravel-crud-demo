<?php

namespace App\Models;

use Illuminate\Database\Eloquent\factories\Hasfactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Hasfactory;

    protected $fillable = [
        'name',
        'detail'
    ];
}
