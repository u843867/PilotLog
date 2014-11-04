@extends('layouts.default')

@section('content')

    <h1>Create New User</h1>
    <h2>we're rockin' & rolling</h2>
    <hr>
    
    {{ Form::open(['route'=>'users.store']) }}
    
        <div>
        {{ Form::label('username', 'Username: ') }}
        {{ Form::input('text', 'username') }}
        {{ $errors->first('username', '<span class=error>:message</span>') }}
        </div>
        
        <br>
        
        <div>
        {{ Form::label('password', 'Password: ') }}
        {{ Form::input('password', 'password') }}
        {{ $errors->first('password', '<span class=error>:message</span>') }}
        </div>
        
       
        <div>
        {{ Form::label('email', 'email: ') }}
        {{ Form::input('email', 'email') }}
        {{ $errors->first('email', '<span class=error>:message</span>') }}
        </div>
        
        
        <div>
            {{ Form::submit('Create User') }}
        </div>        
        
        
        
        
    {{ Form::close() }}
    
    <br> <br>
    
    <p> this is the $error array </p>
    
    {{dd($errors->toArray())}};
    
    <p> this is the input array </p>
    {{dd(Input()->toArray())}};
    
    
    
    
@stop