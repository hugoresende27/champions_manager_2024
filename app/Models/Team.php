<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname','address','website','colors','code','funding_year','country_id', 'flag', 'api_external_id'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public static function getColors($teamId)
    {
        $team = Team::where(['id' => $teamId])->first();
        $colors = explode("/", $team ->colors);
        $lowercaseColors = array_map('strtolower', $colors);
        return $lowercaseColors;
    }
}
