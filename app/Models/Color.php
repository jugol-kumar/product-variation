<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function product(){
        return $this->belongsTo(Color::class);
    }

    public function images(){
        return $this->hasMany(ColorImage::class);
    }


}
