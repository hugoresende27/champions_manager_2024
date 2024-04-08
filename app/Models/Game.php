<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'season_win',
        'season_draw',
        'season_lost',
        'season_points',
        'season_games_played',
        'total_win',
        'total_draw',
        'total_lost',
        'total_points',
        'total_games_played',
        'total_time_played',
        'current_date',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
