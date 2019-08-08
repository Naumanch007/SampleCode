<?php

namespace App\Http\Controllers;

use App\ModelAccessor\StudioAccessor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studioAccessor = new StudioAccessor();
        $studios= $studioAccessor->updateStudioGrades($studioAccessor->getStudios());
        $coachingOptions = $studioAccessor->getCoachingOptions();
        $cityOptions = $studioAccessor->getStudioCities();
        return view('search', ['studios' => $studios, 'coachingOptions' => $coachingOptions, 'cityOptions' => $cityOptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $studioAccessor = new StudioAccessor();
        $studios= $studioAccessor->updateStudioGrades($studioAccessor->getStudios());
        echo json_encode($studios);
        return;
    }
}
