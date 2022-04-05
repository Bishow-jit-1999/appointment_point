@extends('admin.layout')
@section('content') 

<form action="{{route('admin.doctor.edit.save')}}" class="col-md-6" method="post">

{{csrf_field()}}

<input type="hidden" name="id" value="{{$doctor->ID}}">

<div class="col-md-6 form-group">
   <span>Doctor Name</span>
<input type="text" name="DName" value="{{$doctor->NAME}}" class="form-control"><br>

</div>


<div class="col-md-6 form-group">
   <span>Doctor Email</span>
<input type="text" name="DEmail" value="{{$doctor->EMAIL}}" class="form-control"><br>

</div>

<div class="col-md-6 form-group">
   <span>Doctor Contact</span>
<input type="text" name="DContact" value="{{$doctor->CONTACT}}" class="form-control"><br>

</div>

<div class="col-md-6 form-group">
   <span>Doctor Department</span>
<input type="text" name="DDepartment" value="{{$doctor->DEPT}}" class="form-control"><br>

</div>


<br>
<input type="submit" value="UPDATE INFO" class="btn btn-success">


</form>

@endsection