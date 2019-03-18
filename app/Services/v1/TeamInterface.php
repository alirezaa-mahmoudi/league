<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/16/2019
 * Time: 5:42 AM
 */

namespace App\Services\v1;
use App\Team;


class TeamInterface
{
    public function addWin($id)
    {
        $team = Team::find($id);
        $team->win= $team->win + 1;
        $team->plays=$team->plays+1;
        $team->save();
        $this->calculateScore($id);

    }
    public function addDraw($id)
    {
        $team = Team::find($id);
        $team->draws = $team->draws + 1;
        $team->plays=$team->plays+1;
        $team->save();
        $this->calculateScore($id);

    }
    public function addLost($id)
    {
        $team = Team::find($id);
        $team->losts = $team->losts + 1;
        $team->plays=$team->plays+1;
        $team->save();


    }

    public function calculateScore($id)
    {
        $team = Team::find($id);
        $points= ($team->win * 3) + ($team->draws * 1);
        $team->points=$points;
        $team->save();
    }
    public function GF($id, $goals)
    {
        $team = Team::find($id);
        $team->gf += $goals;
        $team->save();
    }
    public function GA($id, $goals){
        $team = Team::find($id);
        $team->ga += $goals;
        $team->save();

    }
    Public static function teamFresh()
    {
        $teams= Team::all();
        foreach ($teams as $team) {

            $team->win = 0;
            $team->draws = 0;
            $team->gf = 0;
            $team->ga = 0;
            $team->losts = 0;
            $team->plays = 0;
            $team->points = 0;
            $team->save();
        }

    }


}
