<?php
/**
 * Created by PhpStorm.
 * User: noumanwaheed
 * Date: 2019-08-08
 * Time: 18:56
 */

namespace App\ModelAccessor;


use App\Coaching;
use App\Contract;
use App\Shower;
use App\Studio;

class StudioAccessor
{
    public function getStudios(){
        return Studio::with(['contract', 'shower', 'coaching'])->get()->toArray();
    }

    public function getStudioCities(){
        return Studio::select('city')->groupBy('city')->get();
    }

    public function getCoachingOptions(){
        return Coaching::get();
    }

    public function updateStudioGrades($studios){
        for ($i = 0; $i < count($studios); $i++){
            $studios[$i]['grade'] = 0;
            if($studios[$i]['coaching'] === Coaching::SHORT_YES){
                $studios[$i]['grade'] += 3;
            }
            else if($studios[$i]['coaching'] === Coaching::SHORT_WEEKDAYS || $studios[$i]['coaching'] === Coaching::SHORT_WEEKEND){
                $studios[$i]['grade'] += 1;
            }

            if($studios[$i]['contract'] === Contract::SHORT_12){
                $studios[$i]['grade'] += 1;
            }
            else if($studios[$i]['contract'] === Contract::SHORT_1){
                $studios[$i]['grade'] += 4;
            }

            if($studios[$i]['contract'] === Shower::SHORT_FEE){
                $studios[$i]['grade'] += 1;
            }
            else if($studios[$i]['contract'] === Shower::SHORT_FREE){
                $studios[$i]['grade'] += 3;
            }
        }
        return $studios;
    }
}
