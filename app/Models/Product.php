<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'brand_id', 'name', 'sku', 'image', 'size_id','cost_price', 'retail_price', 'year', 'description', 'status'];

    // Const for boolean value
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
