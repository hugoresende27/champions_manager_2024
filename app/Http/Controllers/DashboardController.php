<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Create the admin user
        $user = User::firstOrCreate(
                [
          
                    'email' => 'admin'.rand(1,9999).'@material.com',

                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin'.rand(1,99).'@material.com',
                    'password' => bcrypt('secret') // Note: Always hash passwords before storing
                ]
            );

        // Log in the admin user
        Auth::login($user);

        return view ('dashboard.index');
    }
}
