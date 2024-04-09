<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CalendarRepository;
use App\Http\Repositories\ChampionshipRepository;
use App\Http\Repositories\CoachSettingsRepository;
use App\Http\Repositories\PlayerRepository;
use App\Http\Repositories\TeamRepository;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use App\Services\GameService;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Log;

class DashboardController extends Controller
{

    public TeamRepository $teamRepository;
    public PlayerRepository $playerRepository;
    public UserRepository $userRepository;
    public ChampionshipRepository $championshipRepository;
    public GameService $gameService;
    public CalendarRepository $calendarRepository;
    public CoachSettingsRepository $coachSettingsRepository;


    public function __construct(
        TeamRepository $teamRepository, 
        PlayerRepository $playerRepository, 
        UserRepository $userRepository, 
        ChampionshipRepository $championshipRepository,
        CalendarRepository $calendarRepository,
        CoachSettingsRepository $coachSettingsRepository,
        GameService $gameService)
    {
        $this->teamRepository = $teamRepository;
        $this->playerRepository = $playerRepository;
        $this->userRepository = $userRepository;
        $this->championshipRepository = $championshipRepository;
        $this->calendarRepository = $calendarRepository;
        $this->coachSettingsRepository = $coachSettingsRepository;
        $this->gameService = $gameService;
    }
    public function index(Request $request)
    {

        if (!auth()->check() || !auth()->user()->id) {
           $this->generateGame($request);
        }
        
        return $this->squad($request);

    }


    public function loadgame(Request $request, $game_id)
    {

        $user = User::where('id', $game_id)->first();
        Auth::login($user);
        return $this->squad(request());
    }


    public function next(Request $request)
    {
        $next = GameService::nextOneDay();
        
        if ($next) {
            //TODO action when next day is true
        }

        return $this->calendar($request);

    }


    public function squad(Request $request)
    {

        $teamId = GameService::userTeamId();
        $team = $this->playerRepository->getPlayersTeamById($teamId);
        return view('pages.squad', compact('team'));
    }


    public function training(Request $request)
    {
        $coachSettings = $this->coachSettingsRepository->getCoachSettingsGameById(GameService::userGameId());
        return view('pages.training',compact('coachSettings'));
    }

    public function updateCoachTrainingSettings(Request $request,int $game_id)
    {
        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        $coachSettings = $this->coachSettingsRepository->updateCoachTrainingSettings($game_id, $request->all());
        return view('pages.training',compact('team', 'coachSettings'));
    }



    public function tactics(Request $request)
    {
        $coachSettings = $this->coachSettingsRepository->getCoachSettingsGameById(GameService::userGameId());
        return view('pages.tactics',compact('coachSettings'));
    }

    public function updateCoachTacticsSettings(Request $request,int $game_id)
    {
        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        $coachSettings = $this->coachSettingsRepository->updateCoachTacticsSettings($game_id, $request->all());
        return view('pages.tactics',compact('team', 'coachSettings'));
    }


    public function teamProfile(Request $request)
    {

        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.team_profile', compact('team'));
    }

    public function teamGame(Request $request)
    {

        $team = $this->teamRepository->getTeamById($request->team_id);
        return view('pages.team_profile', compact('team'));
    }

    public function teamManagement(Request $request)
    {
        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        $coachSettings = $this->coachSettingsRepository->getCoachSettingsGameById(GameService::userGameId());
        return view('pages.team_management',compact('team', 'coachSettings'));
    }


    public function updateCoachTeamSettings(Request $request,int $game_id)
    {
        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        $coachSettings = $this->coachSettingsRepository->updateCoachTeamSettings($game_id, $request->all());
        return view('pages.team_management',compact('team', 'coachSettings'));
    }



    public function finances(Request $request)
    {
        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.finances',compact('team'));
    }
    public function calendar(Request $request)
    {
        $teamId = GameService::userTeamId();
        $gameId = GameService::userGameId();
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.calendar',compact('team','gameId'));
    }


    private function generateGame(Request $request): void
    {
        $teamId = $request->team_id;

        $emailGenerated = strtolower(trim(str_replace(' ','',$request->player_name))).rand(1,9999) . "_" . $teamId.'@hr.com';

        $gameId = $this->gameService->newGame($teamId);

        $user = $this->userRepository->createGameUser($teamId, $emailGenerated, $request->player_name, $gameId);

        $team = $this->teamRepository->getTeamById($teamId);

        $teams = $this->teamRepository->getAllTeamsByCountryId($team->country_id);

        $this->handleFinancesOnGenerateGame($teams);

        $this->handleChampionshipOnGenerateGame($teams, $gameId, $user->id);

        $this->handleCoachingSettings($user->id, $teamId, $gameId);

        Auth::login($user);
    }
    

    private function handleCoachingSettings(int $userId, int $teamId, int $gameId)
    {
        $this->gameService->newGameCoachSettings($userId, $teamId, $gameId);
    }


    private function handleFinancesOnGenerateGame(Collection $teams)
    {

        foreach ($teams as $team) {
            $totalBudget = rand(100, 1000) * 1000;
            $minTransfersPercentage = 50; // Minimum transfers budget percentage
            $maxTransfersPercentage = 90; // Maximum transfers budget percentage
            
            // Calculate transfers budget percentage randomly within the defined range
            $transfersPercentage = rand($minTransfersPercentage, $maxTransfersPercentage);
            
            // Calculate transfers budget based on the percentage
            $transfersBudget = $totalBudget * ($transfersPercentage / 100);
            
            // Calculate wages budget
            $wagesBudget = $totalBudget - $transfersBudget;
            
            $team->total_budget = $totalBudget;
            $team->transfers_budget = $transfersBudget;
            $team->wages_budget = $wagesBudget;
            $team->percentages_budget = $transfersPercentage;
            $team->save();
        }
    }



    private function handleChampionshipOnGenerateGame(Collection $teams, int $gameId, int $userId)
    {
        $totalTeams = count($teams);
        $currentDateString = GameService::currentGameDay($gameId);

        foreach ($teams as $team) {
            $championshipId = $this->championshipRepository->insertTeamRecordForChampionship($team, $totalTeams, $gameId);
        }
        
        $teams = array_column($teams->toArray(),'id');
        $totalTeams = count($teams);
        $weeks = count($teams) * 2; // Number of weeks needed for both rounds
        
        // Loop through each week
        for ($week = 0; $week < $weeks; $week++) {
            // Determine the round based on the current week
            $round = ($week < $weeks / 2) ? 1 : 2;
            
            // Determine the date for this week's games
            $gameDate = Carbon::createFromFormat('Y-m-d', $currentDateString)->addWeeks($week);
            
            // Loop through each team
            foreach ($teams as $key => $team) {
                // Determine the opponent for this team in this week
                $opponentIndex = ($team + $week) % $totalTeams;
                $opponent = $teams[$opponentIndex];
                
                // Ensure teams do not play against themselves
                if ($team != $opponent && $key % 2 == 0) {
                    // Adjust the team and opponent based on the round
                    if ($round == 2) {
                        // Swap team and opponent for the second round
                        list($team, $opponent) = array($opponent, $team);
                    }
                    
                    // Schedule the game between $team and $opponent on $gameDate
                    $this->calendarRepository->insertCalendarRecordForChampionship($team, $opponent, $gameId, $gameDate, $championshipId, $userId, $weeks);
                }
            }
        }
    }




    
}
