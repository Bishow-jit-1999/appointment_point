@extends('admin.layout')
@section('content') 

<table class="table table-bordered">
   <thead> 
    <tr>
        <th scope="col">Appointment ID</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Patient Date of birth</th>
        <th scope="col">Patient Contact</th>
        <th scope="col">Patient Email</th>
        <th scope="col">Appointed Doctor</th>
        <th scope="col">Doctor Department</th>
        <th scope="col">Appointment  Date</th>
        <th scope="col">Appointment Time</th>
        <th scope="col">Appointment Status</th>
        <th>Actions</th>
        <th></th>
        
    </tr>
   </thead> 
    @foreach($appoint as $a)
    <tbody>
    <tr> 
        <td>{{($a->ID)}}</td>
        <td>{{($a->Patient->NAME)}}</td>
        <td>{{($a->Patient->DOB)}}</td>
        <td>{{($a->Patient->CONTACT)}}</td>
        <td>{{($a->Patient->EMAIL)}}</td>
        <td>{{($a->Doctor->NAME)}}</td>
        <td>{{($a->Doctor->DEPT)}}</td>
        <td>{{($a->DATE)}}</td>
        <td>{{($a->TIME)}}</td>
        <td> <strong><mark>{{($a->STATUS)}}</mark></strong></td>
        <td><a href="{{route('admin.appointment.update',['id'=>$a->ID])}}" {{$a->STATUS=='VISITED' ? 'disabled' : ''}} class="btn btn-success">UPDATE STATUS</a></td>
        
        </tr>  
    </tbody>
    

    @endforeach

@endsection

