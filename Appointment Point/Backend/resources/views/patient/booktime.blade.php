@extends('patient.patlayout')
@section('content')


<form action="{{route('patient.appointment.save')}}" class="col-md-6" method="post">

<h2 style="text-align:center">Take Appointment of doctor {{$doc->NAME}}</h2>
<h3 style="text-align:center">Specalist in {{$doc->DEPT}}</h3>

{{csrf_field()}}

<input type="hidden" name="doc_id" value="{{$doc->ID}}">

<div class="col-md-6 form-group">
   <span>Date of appointment</span>
<input type="Date" name="date_appt"  class="form-control" required><br>

</div>


<div class="col-md-6 form-group">
   <span>Time of appointment</span>
   <input type="time" id="appt" name="appt_time"  class="form-control
       min="10:00" max="20:00" required>

<small>Appointment hours are 10am to 8pm</small>

</div>
<input type="hidden" name="status" value="Appointed">
<br>
<input type="submit" value="Confirm Appointment"  class="btn btn-success" >


</form>

@endsection