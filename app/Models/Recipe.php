<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'steps',
        'image',
        'category'
    ];
}
