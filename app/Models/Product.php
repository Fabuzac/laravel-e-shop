<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'details',
        'price',
        'description',
        'category_id',
    ];

    // Voyager Relationship
    public function categoryId()
    {
        return $this->belongsTo(Category::class);
    }

    // Get product Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
