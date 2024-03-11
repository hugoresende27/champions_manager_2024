<?php

namespace App\Http\Repositories;
use App\Models\Player;


class PlayerRepository
{

    public function getPlayersTeamById(int $teamId)
    {
        return Player::where(['team_id' => $teamId])->get();
    }
}