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
    public function getStudios($data)
    {
        $query = Studio::with(['contract', 'shower', 'coaching'])->orderBy('price', 'asc');


        //TODO - add all checks for all search criteria
        if (!empty($data)) {
            if ($data['open24'] != '') {
                if ($data['open24'] == 'true') {

                    $open24 = 1;
                } else {
                    $open24 = 0;
                }
                $query->where('time_24hours', $open24);
            }

            if ($data['city'] != '') {
                $query->where('city', $data['city']);
            }

            if ($data['coaching'] != '') {
                $query->where('coaching', $data['coaching']);
            }

            if ($data['price'] != '') {

                $price = explode('-', $data['price']);
                $query->whereBetween('price', [$price[0], $price[1]]);
            }
        }

        $studios = $query->get()->toArray();
        if (count($studios) > 0) {
            return  $studios;
        } else {
            return Studio::with(['contract', 'shower', 'coaching'])->orderBy('price', 'asc')->get()->toArray();
        }
    }

    public function getStudioCities()
    {
        return Studio::select('city')->groupBy('city')->get();
    }

    public function getCoachingOptions()
    {
        return Coaching::get();
    }

    public function updateStudioGrades($studios)
    {
        $achievementWinnerGrade = 0;
        $achievementWinnerIndex = 0;
        for ($i = 0; $i < count($studios); $i++) {
            $studios[$i]['grade'] = 0;
            if ($studios[$i]['coaching']['short'] === Coaching::SHORT_YES) {
                $studios[$i]['grade'] += 3;
            } else if ($studios[$i]['coaching']['short'] === Coaching::SHORT_WEEKDAYS || $studios[$i]['coaching']['short'] === Coaching::SHORT_WEEKEND) {
                $studios[$i]['grade'] += 1;
            }

            if ($studios[$i]['contract']['short'] === Contract::SHORT_12) {
                $studios[$i]['grade'] += 1;
            } else if ($studios[$i]['contract']['short'] === Contract::SHORT_1) {
                $studios[$i]['grade'] += 4;
            }

            if ($studios[$i]['shower']['short'] === Shower::SHORT_FEE) {
                $studios[$i]['grade'] += 1;
            } else if ($studios[$i]['shower']['short'] === Shower::SHORT_FREE) {
                $studios[$i]['grade'] += 3;
            }

            if ($i == 0) {
                $studios[$i]['pricePerformanceWinner'] = true;
            } else {
                $studios[$i]['pricePerformanceWinner'] = false;
            }

            $studios[$i]['achievementWinner'] = false;

            if ($achievementWinnerGrade < $studios[$i]['grade']) {
                $achievementWinnerIndex = $i;
                $achievementWinnerGrade = $studios[$i]['grade'];
            }
        }
        $studios[$achievementWinnerIndex]['achievementWinner'] = true;
        return $studios;
    }
}
