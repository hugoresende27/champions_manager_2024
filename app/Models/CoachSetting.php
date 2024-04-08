<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachSetting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'team_id',
        'game_id',
        'day_off',
        'player_dev',
        'team_meeting',
        'scouting_report',
        'trainning',
        'tactics_wings',
        'tactics_center',
        'defense_line',
        'waste_time',
        'man_marking',
        'zone_marking',
        'aggressive',
        'smooth',
        'balance',
        'tactic',
    ];


    protected $table = 'coach_settings';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
