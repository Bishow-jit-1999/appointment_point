@extends('patient.patlayout')
@section('content')

<div>

<img src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY1s-MMuCu5tpv1hcuLD-DXPOb_Pn5JSBety8zxe0BKiBK5lix-LRU-lZfuNHSYEJnoDk&usqp=CAU')}}" width="200px" height="200px" class="rounded float-left" alt="Patient">

</div>

<div>

    <h2 class="display-3">{{($patient->USERNAME)}}</h2>
    <h3 class="display-4">Name:{{($patient->NAME)}}</h3>
    <h3 class="display-4">Date of birth:{{($patient->DOB)}}</h3>
    <h3 class="display-4">Email:{{($patient->EMAIL)}}</h3>
    <h3 class="display-4">Contact:{{($patient->CONTACT)}}</h3>
    <h3 class="display-4">Pending Appointments:{{($appoint)}}</th3>
    <h3 class="display-4">Visited Appointments:{{($appoint_past)}}</th3>

</div>



@endsection