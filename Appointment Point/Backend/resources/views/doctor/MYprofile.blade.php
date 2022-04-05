@extends('doctor.doclayout')
@section('content')

<div>

<img src="{{asset('https://img.favpng.com/8/14/19/font-awesome-computer-icons-user-doctor-of-medicine-png-favpng-WT8gtzDHRDk9mtJYv7617x1rz.jpg')}}"  width="200px" height="200px" class="rounded float-left" alt="DOCTOR">

</div>

<div>

    <h2 class="display-3">{{($doctor->USERNAME)}}</h2>
    <h3 class="display-4">Name:{{($doctor->NAME)}}</h3>
    <h3 class="display-4">Department:{{($doctor->DEPT)}}</h3>
    <h3 class="display-4">Contact:{{($doctor->CONTACT)}}</h3>
    <h3 class="display-4">Email:{{($doctor->EMAIL)}}</h3>
    <h3 class="display-4">Pending Appointments:{{($appoint)}}</h3>
    <h3 class="display-4">Visited Appointments:{{($appoint_past)}}</h3>
</div>



@endsection