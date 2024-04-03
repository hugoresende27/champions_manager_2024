<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendar';

    protected $fillable = [
        'game_date',
        'home_team_id',
        'away_team_id',
        'home_team_goals',
        'away_team_goals',
        'championship_id',
        'game_id',
        'user_id',
    ];

    protected $guarded = ['id'];

    /**
     * Get the home team for the game.
     */
    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    /**
     * Get the away team for the game.
     */
    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    /**
     * Get the championship for the game.
     */
    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }

    /**
     * Get the game for the calendar.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Get the user who scheduled the game.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
