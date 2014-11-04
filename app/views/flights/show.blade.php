@extends('layouts.default')

@section('content')


        <h1>A Flight</h1>
        
        <table>
            <thead>
                <tr> 
                    <th>id</th>
                    <th>date</th>
                    <th>aircraft type</th>
                    <th>from</th>
                    <th>departure time</th>
                    <th>to</th>
                    <th>arrival time</th>
                </tr>
            </thead> 
            <tr>
                    <td> {{ $flight->id }} </td>
                    <td> {{ $flight->date }} </td>
                    <td> {{ $flight->ac_type }} </td>
                    <td> {{ $flight->from_place }} </td>
                    <td> {{ $flight->dep_time }} </td>
                    <td> {{ $flight->to_place }} </td>
                    <td> {{ $flight->arr_time }} </td>
            </tr>
        </table>
        
        <hr>
        
        
        <div>
            
        {{ Form::open(array('route' => array('flights.destroy',$flight->id), 'method' => 'delete')) }}
        <div>
        {{ Form::submit('Delete') }}
        </div>       
        {{ Form::close() }}
    
        
        {{ Form::open(array('route' => array('flights.update',$flight->id), 'method' => 'put')) }}
<!--        {{ Form::hidden('id', $flight->id) }}-->
        <div>
        {{ Form::submit('Update') }}
        </div>     
        {{ Form::close() }}
        
        </div>   

@stop        

        