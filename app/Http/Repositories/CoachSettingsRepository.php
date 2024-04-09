<?php

namespace App\Http\Repositories;
use App\Models\CoachSetting;


class CoachSettingsRepository
{

    public function getCoachSettingsGameById(int $gameId): CoachSetting
    {
        return CoachSetting::where(['game_id' => $gameId])->first();
    }



    public function updateCoachTeamSettings(int $gameId, array $data): CoachSetting
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


    public function updateCoachTrainingSettings(int $gameId, array $data): CoachSetting
    {

        CoachSetting::where(['game_id' => $gameId])->update(
            [
                "training" => isset($data['training']) ? $data['training'] : 1,
            ]);
        return self::getCoachSettingsGameById($gameId);
    }

    public function updateCoachTacticsSettings(int $gameId, array $data): CoachSetting
    {
        CoachSetting::where(['game_id' => $gameId])->update(
            [
                "tactics_wings" => isset($data['tactics_wings']) ?? 0,
                "tactics_center" => isset($data['tactics_center']) ?? 0,
                "defense_line" => isset($data['defense_line']) ?? 0,
                "waste_time" => isset($data['waste_time']) ?? 0,
                "zone_marking" => isset($data['zone_marking']) ?? 0,
                "man_marking" => isset($data['man_marking']) ?? 0,
                "smooth" => isset($data['smooth']) ?? 0,
                "aggressive" => isset($data['aggressive']) ?? 0,
                "balance" => $data['tactic_input']
            ]);
        return self::getCoachSettingsGameById($gameId);
    }
}