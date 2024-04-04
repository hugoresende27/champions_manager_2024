<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CalendarRepository;
use App\Http\Repositories\ChampionshipRepository;
use App\Http\Repositories\PlayerRepository;
use App\Http\Repositories\TeamRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Game;
use App\Models\User;
use App\Services\GameService;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public TeamRepository $teamRepository;
    public PlayerRepository $playerRepository;
    public UserRepository $userRepository;
    public ChampionshipRepository $championshipRepository;
    public GameService $gameService;
    public CalendarRepository $calendarRepository;

    public function __construct(
        TeamRepository $teamRepository, 
        PlayerRepository $playerRepository, 
        UserRepository $userRepository, 
        ChampionshipRepository $championshipRepository,
        CalendarRepository $calendarRepository,
        GameService $gameService)
    {
        $this->teamRepository = $teamRepository;
        $this->playerRepository = $playerRepository;
        $this->userRepository = $userRepository;
        $this->championshipRepository = $championshipRepository;
        $this->calendarRepository = $calendarRepository;
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


    public function teamProfile(Request $request)
    {

        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.team_profile', compact('team'));
    }
    public function teamManagement(Request $request)
    {
        $teamId = GameService::userTeamId();
        $team = $this->teamRepository->getTeamById($teamId);
        return view('pages.team_management',compact('team'));
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
        $gameId = GameService::userGameId();;
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

        Auth::login($user);
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
        // dd($gameId);
        $totalTeams = count($teams);
        $teamIds = array_column($teams->toArray(), 'id');
        $currentDateString = GameService::currentGameDay($gameId);
        $currentDate = Carbon::createFromFormat('Y-m-d', $currentDateString);
        $totalRounds = 18; 

        $currentGameDate = $this->getNextSaturdayOrSunday($currentDate);
        $scheduledGames = [];
        foreach ($teams as $team) {
            $teamGameDate = $currentGameDate;
            foreach ($teamIds as $opponentId) {

                // if (count($scheduledGames) >= $totalRounds) {
                //     break; // Stop scheduling games for this team if total rounds reached
                // }

                // Skip same team matchup
                if ($team['id'] == $opponentId) {
                    continue;
                }
                $championshipId = $this->championshipRepository->insertTeamRecordForChampionship($team, $totalTeams, $gameId);
                $this->calendarRepository->insertCalendarRecordForChampionship($team['id'], $opponentId, $gameId, $teamGameDate, $championshipId, $userId);
                $teamGameDate = $teamGameDate->addWeek(); // Increment game date for the next game of the same team

                $scheduledGames[] = [ // Keep track of scheduled games (optional)
                    "team" => $team["id"],
                    "opponent" => $opponentId,
                    "date" => $teamGameDate->format("Y-m-d"),
                  ];
            }
        }
        
    
       
    }

    private function getNextSaturdayOrSunday(Carbon $date)
    {
        // Get next Saturday or Sunday
        while (!in_array($date->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY])) {
            $date->addDay();
        }
        return $date;
    }
    
}
