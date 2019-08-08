@extends('layouts.app')

@section('content')
    <search-component :coaching-options="{{ json_encode($coachingOptions, true) }}" :city-options="{{ json_encode($cityOptions, true) }}"></search-component>
    <br>
    <search-results-component :studios="{{ json_encode($studios, true) }}"></search-results-component>
@endsection
