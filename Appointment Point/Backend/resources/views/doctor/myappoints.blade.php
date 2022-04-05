@extends('doctor.doclayout')
@section('content')

<table class="table table-bordered">
    <thead>
    <tr>
        
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor  Name</th>
        <th scope="col">Doctor DEPT</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Patient Date of birth</th>
        <th scope="col">Patient Contact</th>
        <th scope="col">Appointment  Date</th>
        <th scope="col">Appointment Time</th>
        <th scope="col">Appointment Status</th>
        <th><scope="col">Action</th>
        
    </tr>
    </thead>

    
    @foreach($appoint as $a)
    <tr> 
 
        <td>{{($a->Doctor->ID)}}</td>
        <td>{{($a->Doctor->NAME)}}</td>
        <td>{{($a->Doctor->DEPT)}}</td>
        <td>{{($a->Patient->NAME)}}</td>
        <td>{{($a->Patient->DOB)}}</td>
        <td>{{($a->Patient->CONTACT)}}</td>
        <td>{{($a->DATE)}}</td>
        <td>{{($a->TIME)}}</td>
        <td><strong>{{($a->STATUS)}}</strong></td>
        <td><a href="{{route('doctor.appointment.update',['id'=>$a->ID])}}" {{$a->STATUS=='VISITED' ? 'disabled' : ''}}  class="btn btn-success">UPDATE STATUS</a></td>
      
    </tr>

    @endforeach

@endsection