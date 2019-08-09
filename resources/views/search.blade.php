@extends('layouts.app')

@section('content')
    <studio-component :coaching-options="{{ json_encode($coachingOptions, true) }}"
                      :city-options="{{ json_encode($cityOptions, true) }}"></studio-component>
@endsection
