<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $fillable = ['name', 'cate_id', 'price', 'quantity', 'detail'];
    // protected $guarded = [];
    
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }
}
