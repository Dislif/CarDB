<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['model', 'brand', 'image'];

    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }

    public function gadgets(){
        return $this->belongsToMany('App\Models\Gadget');
    }
}
