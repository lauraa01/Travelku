<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = "destination";
    protected $guarded = [];

    public function order(){
        return $this->hasMany(Order::class);
    }
}
