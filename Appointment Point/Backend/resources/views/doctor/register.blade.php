@extends('admin.layout')
@section('content')

<form action="{{route('admin.doctor.save')}}" class="col-md-6" method='post'>
    {{csrf_field()}}

    
  <div class="col-md-6 form-group">
  <label>
    <p class="label-txt">ENTER DOCTOR NAME</p>
    <input type="text" name="DoctorName" value="{{old('DoctorName')}}"  class="form-control">
    @error('DoctorName')
   <span class="text-danger">{{$message}}</span>
     @enderror 
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
</div>
  
  <div class="col-md-6 form-group">
  <label>
    <p class="label-txt">ENTER DOCTOR EMAIL</p>
    <input type="text"  name="DoctorEmail" value="{{old('DoctorEmail')}}"  class="form-control">
    @error('DoctorEmail')
   <span class="text-danger">{{$message}}</span>
     @enderror 
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  </div>
  <br>
  <div class="col-md-6 form-group">
  <label>
    <p class="label-txt">ENTER DOCTOR CONTACT</p>
    <input type="text"  name="DoctorContact" value="{{old('DoctorContact')}}"  class="form-control">
    @error('DoctorContact')
   <span class="text-danger">{{$message}}</span>
     @enderror 
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  </div>
  <br>
  <div class="col-md-6 form-group">
  <label>
    <p class="label-txt">ENTER DOCTOR DEPARTMENT</p>
    <input type="text" name="DoctorDepartment" value="{{old('DoctorDepartment')}}"  class="form-control">
    @error('DoctorDepartment')
   <span class="text-danger">{{$message}}</span>
     @enderror 
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
</div>
  <br>
  <div class="col-md-6 form-group">
  <label>
    <p class="label-txt">ENTER DOCTOR USERNAME</p>
    <input type="text"  name="DoctorUserName" value="{{old('DoctorUserName')}}"  class="form-control">
    @error('DoctorUserName')
   <span class="text-danger">{{$message}}</span>
     @enderror 
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
</div>
  <br>
  <div class="col-md-6 form-group">
  <label>
    <p class="label-txt">ENTER DOCTOR PASSWORD</p>
    <input type="text" name="DoctorPassword" value="{{old('DoctorPassword')}}"  class="form-control">
    @error('DoctorPassword')
   <span class="text-danger">{{$message}}</span>
     @enderror 
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
</div>
  <br>

  <input type="hidden" name="Dtype" value="DOCTOR">
  <button type="submit" class="btn btn-success">ADD</button>
</form>
  

@endsection


