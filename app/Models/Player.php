<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname','country_id','team_id','city_of_birth','birth_date','salary','position', 'side', 'api_external_id'];

}
