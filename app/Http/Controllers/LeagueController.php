<?php

namespace App\Http\Controllers;

use App\Schedule;

use App\Services\v1\PlayGame;
use App\Services\v1\TeamInterface;
use App\Team;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;


class LeagueController extends Controller
{
    public function index()
    {
        $team=[1,2,3,4];
        $fixture = new \App\Services\v1\Fixture($team);
        $playGame = new PlayGame();
        $playGame->initialized();
        Schedule::query()->truncate();
        TeamInterface::teamFresh();
        $timeTable =$fixture->getSchedule();
        Schedule::createSchedule($timeTable);
        $teams= Team::all()->sortByDesc('points');
        return view('league', compact('teams'));
    }

    public function play ()
    {
        $playGame = new PlayGame();
        $week=$playGame->showWeek();
        if($playGame->showWeek() < 6)
        {
            $playGame->result();
            $weekResults= $playGame->getResults();
            $playGame->nextWeek();
            $week = $playGame->showWeek();
            $teams= Team::all()->sortByDesc('points');
            return view('play', compact('teams', 'week', 'weekResults'));

        }
        else
        {

            return view('play' , compact('teams', 'week' ,'weekResults'));
        }

    }
    public function playall()
    {
        $playGame = new PlayGame();
        $week=$playGame->showWeek();
        for ($i=0 ; $i<6 ;$i++)
            {
                $playGame->result();
                $weekResults= $playGame->getResults();

                $playGame->nextWeek();


            }
        $teams= Team::all()->sortByDesc('points');

        $week = $playGame->showWeek();
        return view('play' , compact('teams', 'week' ,'weekResults'));

    }


}
