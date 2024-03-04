<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if (!auth()->check() || !auth()->user()->id) {
            $teamId = $request->team_id;
            $emailGenerated = strtolower(trim(str_replace(' ','',$request->player_name))).rand(1,9999) . "_" . $teamId.'@hr.com';
    
            // Create the admin user
            $user = User::firstOrCreate(
                    [
              
                        'email' => $emailGenerated,
                        'about' =>  $teamId
    
                    ],
                    [
                        'name' => $request->player_name,
                        'email' => $emailGenerated,
                        'password' => bcrypt('secret'),
                        'about' =>  $teamId
                    ]
                );
    
            // Log in the admin user
            Auth::login($user);
        }
        
        return $this->squad($request);

    }

    public function squad(Request $request)
    {

        $teamId = auth()->user()->about;
   
        $team = Player::where(['team_id' => $teamId])->get();
        return view('pages.squad', compact('team'));
    }
    public function teamProfile(Request $request)
    {

        $teamId = auth()->user()->about;
        $team = Team::where(['id' => $teamId])->firstOrFail();
        return view('pages.team_profile', compact('team'));
    }
    public function teamManagement(Request $request)
    {

        dd('todo');
    }
}
