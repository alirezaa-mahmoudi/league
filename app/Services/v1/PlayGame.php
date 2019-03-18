<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/15/2019
 * Time: 9:46 AM
 */

namespace App\Services\v1;
use App\Schedule;
use App\Team;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class PlayGame
{
    protected $home;
    protected $away;
    public $finalResult=[];
    protected $week=0;
    public function __construct()
    {
        $this->week=$this->fetchWeek();
    }


    public function result()
    {
        $matches=Schedule::where('week' , $this->week)->get();

        foreach ($matches as $match)
        {
            $homeScore=rand(0,5);
            $awayScore=rand(0,5);
            $this->updateScore($match->id, $homeScore, $awayScore);
        }


    }
    public function initialized (){
         $this->week=0;
         $this->saveWeek();

    }
    public function nextWeek()
    {
        $this->week = (int)$this->week+1;
        $this->saveWeek();


    }
    public function fetchWeek()
    {
        $week = Storage::get('week.txt');
        return $week;

    }
    public function saveWeek()
    {
        return Storage::put('week.txt' , $this->week);
    }
    public function showWeek()
    {
        return $this->week;
    }
    protected function updateScore($match,$homeScore, $awayScore)
    {
        $teamInterface = new TeamInterface();
        $match = Schedule::find($match);
        $match->homescore= $homeScore;
        $match->awayscore = $awayScore;
        $match->save();
        $teamInterface->GA($match->home,$awayScore);
        $teamInterface->GF($match->home, $homeScore);
        $teamInterface->GA($match->away,$homeScore);
        $teamInterface->GF($match->away, $awayScore);
        if ($homeScore > $awayScore)
        {
            $teamInterface->addWin($match->home);
            $teamInterface->addLost($match->away);
        }
        elseif ($homeScore < $awayScore)
        {
            $teamInterface->addWin($match->away);
            $teamInterface->addLost($match->home);
        }
        elseif ($homeScore === $awayScore)
        {
            $teamInterface->addDraw($match->away);
            $teamInterface->addDraw($match->home);

        }

    }
    public function getResults()
    {
        return Schedule::where('week', $this->week)->get();
    }


}
