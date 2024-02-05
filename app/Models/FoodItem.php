<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;
    protected $fillable = ['food_name', 'food_price', 'description', 'image', 'availability_status', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }
}
