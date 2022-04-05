@extends('admin.layout')
@section('content')

<table class="table table-borded">
    <tr>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Contact</th>
        <th>Patient Email</th>
        <th>Patient Date of Birth</th>
        <th>Patient Username</th>
    </tr>
    @foreach($patients as $p)
    <tr> 
        <td>{{($p->ID)}}</td>
        <td>{{($p->NAME)}}</td>
        <td>{{($p->CONTACT)}}</td>
        <td>{{($p->EMAIL)}}</td>
        <td>{{($p->DOB)}}</td>
        <td>{{($p->USERNAME)}}</td>
    </tr>
    @endforeach
</table>

@endsection