@extends('layouts.default')

@section('content')

        <h1>All Flights</h1>
        <br>
        <hr>
        
      <!-- check for no flights -->
        @if ($flights->isEmpty()) 
        {{'no flights'}}
        @endif
        
        @foreach ($flights as $flight)
        <li> {{ link_to("/flights/{$flight->id}", $flight->id) }} </li>
        @endforeach
@stop

