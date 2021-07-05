<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
