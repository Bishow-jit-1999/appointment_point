@extends('patient.patlayout')
@section('content')

<table class="table table-striped">
    
    <tr>
       
        <th scope="col">Doctor Name</th>
        <th scope="col">Doctor Department</th>
        <th scope="col">Doctor Email</th>
        <th>Actions</th>
        <th></th>
        
    </tr>
    
    @foreach($doctors as $d)
    <tr> 
        <td>{{($d->NAME)}}</td>
        <td>{{($d->DEPT)}}</td>
        <td>{{($d->EMAIL)}}</td>
       <td><a href="{{route('patient.appointment.time',['id'=>$d->ID])}}"><button class="btn btn-primary">Take Appointment</button></a></td>
        
    </tr>

    @endforeach

    @endsection