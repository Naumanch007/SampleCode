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
        $coachingOptions = $studioAccessor->getCoachingOptions();
        $cityOptions = $studioAccessor->getStudioCities();
        return view('search', ['coachingOptions' => $coachingOptions, 'cityOptions' => $cityOptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $studioAccessor = new StudioAccessor();
        $studios= $studioAccessor->updateStudioGrades($studioAccessor->getStudios($request->all()));
        echo json_encode($studios);
        return;
    }
}
