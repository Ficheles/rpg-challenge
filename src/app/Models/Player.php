<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class_id',
        'xp',
        'confirmed',
        // 'class'
    ];
    
    public function class()
    {
        return $this->belongsTo(RpgClass::class); 
    }

    public function guild()
    {
        return $this->belongsTo(Guild::class);
    }
}

