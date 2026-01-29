<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // (không bắt buộc, Laravel tự hiểu)

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
    ];
}
