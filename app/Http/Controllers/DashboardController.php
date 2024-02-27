<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $teamId = $request->team_id_hidden;
        $emailGenerated = strtolower(trim(str_replace(' ','',$request->player_name_hidden))).rand(1,9999) . "_" . $teamId.'@hr.com';

        // Create the admin user
        $user = User::firstOrCreate(
                [
          
                    'email' => $emailGenerated,
                    'about' =>  $teamId

                ],
                [
                    'name' => $request->player_name_hidden,
                    'email' => $emailGenerated,
                    'password' => bcrypt('secret'),
                    'about' =>  $teamId
                ]
            );

        // Log in the admin user
        Auth::login($user);

        return view ('dashboard.index');
    }
}
