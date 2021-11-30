<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $table = 'passengers';
    public $fillable = ['name', 'car_id', 'travel_time'];
    // protected $guarded = [];
    public function car(){
        return $this->belongsTo(Car::class, 'car_id');
    }
}

?>