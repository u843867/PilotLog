@extends('layouts.default')

@section('content')

    <h2>login to {{ $value = Session::get('intent') }}</h2>
    <hr>
    
    {{ Form::open(['route'=>'sessions.store']) }}
    
        <div>
        {{ Form::label('email', 'Email: ') }}
        {{ Form::input('email', 'email') }}
        {{ $errors->first('email', '<span class=error>:message</span>') }}
        </div>
        
        <br>
        
        <div>
        {{ Form::label('password', 'Password: ') }}
        {{ Form::input('password', 'password') }}
        {{ $errors->first('password', '<span class=error>:message</span>') }}
        </div>
          
        
        <div>
            {{ Form::submit('login') }}
        </div>        
        
        
        
        
    {{ Form::close() }}
    
    
    
    
    <br> <br>
    
    <p> sessions variable: {{ $value = Session::get('intent') }} </p>
    <p> this is the $error array </p>
    
 
    

    
    
@stop