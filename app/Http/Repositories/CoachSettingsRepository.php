<?php

namespace App\Http\Repositories;
use App\Models\CoachSetting;


class CoachSettingsRepository
{

    public function getCoachSettingsGameById(int $gameId): CoachSetting
    {
        return CoachSetting::where(['game_id' => $gameId])->first();
    }



    public function updateCoachSettings(int $gameId, array $data): CoachSetting
    {

        CoachSetting::where(['game_id' => $gameId])->update(
            [
                "day_off" => isset($data['day_off']) ?? 0,
                "player_dev" => isset($data['player_dev']) ?? 0,
                "team_meeting" => isset($data['team_meeting']) ?? 0,
                "scouting_report" => isset($data['scouting_report']) ?? 0
            ]);
        return self::getCoachSettingsGameById($gameId);
    }
}