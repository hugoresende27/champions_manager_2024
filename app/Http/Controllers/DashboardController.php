<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PlayerRepository;
use App\Http\Repositories\TeamRepository;
use App\Http\Repositories\UserRepository;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public TeamRepository $teamRepository;
    public PlayerRepository $playerRepository;
    public UserRepository $userRepository;

    public function __construct(TeamRepository $teamRepository, PlayerRepository $playerRepository, UserRepository $userRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->playerRepository = $playerRepository;
        $this->userRepository = $userRepository;
    }
    public function index(Request $request)
    {

        if (!auth()->check() || !auth()->user()->id) {
           $this->generateGame($request);
        }
        
        return $this->squad($request);

    }

    public function squad(Request $request)
    {

        $teamId = auth()->user()->about;
        $team = $this->playerRepository->getPlayersTeamById($teamId);
        return view('pages.squad', compact('team'));
    }
    public function teamProfile(Request $request)
    {

        $teamId = auth()->user()->about;
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.team_profile', compact('team'));
    }
    public function teamManagement(Request $request)
    {
        dd('todo');
        return view('dashboard.index');
    }
    public function finances(Request $request)
    {
        $teamId = auth()->user()->about;
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.finances',compact('team'));
    }


    private function generateGame(Request $request): void
    {
        $teamId = $request->team_id;
        $emailGenerated = strtolower(trim(str_replace(' ','',$request->player_name))).rand(1,9999) . "_" . $teamId.'@hr.com';

        $user = $this->userRepository->createAdminUser($teamId, $emailGenerated, $request->player_name);

        $team = $this->teamRepository->getTeamById($teamId);
        $teams = $this->teamRepository->getAllTeamsByCountryId($team->country_id);

        foreach ($teams as $team) {
            $totalBudget = rand(100, 1000) * 1000;
            $transfersBudget = rand(10, $totalBudget / 1000) * 1000;
            $wagesBudget = $totalBudget - $transfersBudget;
        
            $team->total_budget = $totalBudget;
            $team->transfers_budget = $transfersBudget;
            $team->wages_budget = $wagesBudget;
            $team->save();
        }

        Auth::login($user);
    }
}
