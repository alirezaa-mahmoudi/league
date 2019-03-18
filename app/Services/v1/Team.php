<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/15/2019
 * Time: 6:55 AM
 */

namespace App\Services\v1;


class Team
{
    public $name='';
    public $wincount=0;
    public $drawCount=0;
    public $loosecount=0;
    public function __construct($name)

    {
        $this->name=$name;

    }
    public function addwin(){
         $this->wincount+=1;
    }
    public function addDraw()
    {
        $this->drawCount+=1;
    }
    public function addloose()
    {
        $this->loosecount+=1;
    }
    public function save(){


    }



}
