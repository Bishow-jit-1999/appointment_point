@extends('patient.patlayout')
@section('content')

<table class="table table-bordered">
    
    <tr>
        
        <th scope="col">Patient Name</th>
        <th scope="col">Patient Contact</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Doctor Email</th>
        <th scope="col">Doctor DEPT</th>
        <th scope="col">Appointment  Date</th>
        <th scope="col">Appointment Time</th>
        <th scope="col">Appointment Status</th>
        
    </tr>
    
    @foreach($appoint as $a)
    <tr> 

        <td>{{($a->Patient->NAME)}}</td>
        <td>{{($a->Patient->CONTACT)}}</td>
        <td>{{($a->Doctor->NAME)}}</td>
        <td>{{($a->Doctor->EMAIL)}}</td>
        <td>{{($a->Doctor->DEPT)}}</td>
        <td>{{($a->DATE)}}</td>
        <td>{{($a->TIME)}}</td>
        <td>{{($a->STATUS)}}</td>
      
    </tr>

    @endforeach

@endsection