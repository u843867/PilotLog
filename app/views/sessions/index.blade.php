@extends('layouts.default')

@section('content')
        <h1>All users</h1>
        <br>
        <hr>
        
      <!-- check for no users -->
        @if ($users->isEmpty()) 
        {{'no users'}}
        @endif
        
        @foreach ($users as $user)
            <li>{{ link_to("/users/{$user->username}", $user->username) }}</li>
        @endforeach
@stop

