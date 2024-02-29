<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
