<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function players()
    {
        return $this->hasMany(Player::class, 'guild_id');
    }

    public function topPlayer()
    {
        return $this->hasOne(Player::class, 'guild_id')
            ->orderByDesc('xp'); 
    }
}
