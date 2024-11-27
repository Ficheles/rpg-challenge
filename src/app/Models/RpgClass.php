<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpgClass extends Model
{
    use HasFactory;

    protected $table = 'rpg_classes';

    protected $fillable = ['name'];

    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
