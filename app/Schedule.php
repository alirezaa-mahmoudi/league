<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=['week', 'home' , 'away', 'homescore','awayscore'];
    public $timestamps=false;


    protected $table='schedule';
    public static  function createSchedule($timetable)
    {
        for($week=0; $week<count($timetable); $week++ )
        {
            for($play=0; $play<count($timetable[$week]); $play++)
            {
                Schedule::create(['week' => $week , 'home' => $timetable[$week][$play][0],
                    'away' =>  $timetable[$week][$play][1]]);
            }

        }
        }
}
