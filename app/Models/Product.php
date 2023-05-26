<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'products';

    // Define the relationship with the Category model
  
    public function category()
    {
    return $this->belongsTo(Category::class, 'idCategory');
    }
}
