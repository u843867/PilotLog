@extends('layouts.default')

@section('content')

 
             
    <hr>

    <h4>Create New Flight</h4>
    <hr>
        
    {{ Form::open(['route'=>'flights.store']) }}
    
        <div>
<!--        {{ Form::label('date', 'Date: ') }}-->
        {{ Form::input('date', 'date') }}
        {{ $errors->first('date', '<span class=error>:message</span>') }}
        </div>
        
        <br>
        
        <div>
<!--        {{ Form::label('from', 'From: ') }}-->
        {{ Form::text('from_place', null, array('placeholder'=>'from' )) }}
<!--        {{ Form::input('text', 'from_place') }}-->
        {{ $errors->first('departure', '<span class=error>:message</span>') }}
        </div>
        
        <div>
        
<!--        {{ Form::input('time', 'dep_time') }}-->
        {{ Form::input('time', 'dep_time') }}
        {{ Form::label('dep_time', "(depart time)") }}
        {{ $errors->first('time', '<span class=error>:message</span>') }}
        </div>
        
        <br>  
        
        <div>
<!--        {{ Form::label('to', 'To: ') }}-->
        {{ Form::text('to_place', null, array('placeholder'=>'to' )) }}
<!--        {{ Form::text('to_place') }}-->
        {{ $errors->first('To', '<span class=error>:message</span>') }}
        </div>
        
        <div>
        {{ Form::input('time', 'arr_time') }}
        {{ Form::label('arr_time', '(arrival time)') }}
        {{ $errors->first('arr_time', '<span class=error>:message</span>') }}
        </div>
       
        <br>
        
        <div>
<!--        {{ Form::label('ac_type', 'Aircraft type: ') }}-->
        {{ Form::text('ac_type', null, array('placeholder'=>'aircraft type' )) }}
<!--        {{ Form::text('ac_type') }}-->
        {{ $errors->first('aircraft type', '<span class=error>:message</span>') }}
        </div>
        
        <br>
       
        <div>
            {{ Form::submit('Create Flight') }}
        </div>
        
        
        
   
        <br> <br>
       <p> sessions variable: {{ $value = Session::get('intent') }} </p>
       
        
    {{ Form::close() }}
    

    
    
    
    
@stop