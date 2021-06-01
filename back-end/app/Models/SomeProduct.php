<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SomeProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'someRowOne',
        'someRowTwo',      
    ];
}
