<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function ()
{
//    $Manchester = new \App\Services\v1\Team('Manchester');
//    $Arsenal =new \App\Services\v1\Team('Arsenal');
//    $Liverpool = new \App\Services\v1\Team('Liverpol');
//    $ManCity= new \App\Services\v1\Team('Mancity');
//
//
//    $team=[$Arsenal,$Manchester,$Liverpool,$ManCity];
//    $t = new \App\Services\v1\Fixture($team);
//    return  dd($t->getSchedule());
    $teams=\App\Team::all();
    foreach ($teams as $team)
    {
        $team->win=0;
        $team->draws=0;
        $team->gf=0;
        $team->ga=0;
        $team->losts=0;
        $team->plays=0;
        $team->points=0;
        $team->save();
    }
//    $result =new \App\Services\v1\TeamInterface();
//    return $result->calculateScore(1);

});
Route::get('league', 'LeagueController@index')->name('league');


Route::get('/start' ,function (){
    return view('start');
});
Route::get('/play', 'LeagueController@play')->name('play');
Route::get('/playall', 'LeagueController@playall')->name('playall');


