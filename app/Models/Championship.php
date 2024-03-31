<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 
        'team_id', 
        'total_games', 
        'games_played', 
        'win', 
        'draw', 
        'lost', 
        'points',
        'game_id'
    ];
}
