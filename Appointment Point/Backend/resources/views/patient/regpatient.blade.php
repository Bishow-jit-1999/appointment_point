<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>


    <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('patient_reg.css')}}">
</head>
<body>


<section class="vh-100 bg-image" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">Appointment Point</h2>
              <h3 class="text-uppercase text-center mb-5">Create an account</h3>

              <form action="{{route('patient.reg.save')}}"  method="POST">
                  {{csrf_field()}}

                <div class="form-outline mb-4">
                  <input type="text"  name="PatientName" value="{{old('PatientName')}}" id="form3Example1cg" class="form-control form-control-lg" /> 
                  <label class="form-label" for="form3Example1cg">Your Name</label>

                  @error('PatientName')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="text"  name="PatientContact"  value="{{old('PatientContact')}}" id="form3Example1cg" class="form-control form-control-lg" />
                
                  <label class="form-label" for="form3Example1cg">Your Phone Number</label>

                  @error('PatientContact')
                     <span class="text-danger">{{$message}}</span>
                  @enderror 
                </div>

                <div class="form-outline mb-4">
                  <input type="email"  name="PatientEmail" value="{{old('PatientEmail')}}" id="form3Example3cg" class="form-control form-control-lg" />
                 
                  <label class="form-label" for="form3Example3cg">Your Email</label>

                  @error('PatientEmail')
                     <span class="text-danger">{{$message}}</span>
                  @enderror 
                </div>

                <div class="form-outline mb-4">
                  <input type="Date"  name="PatientDOB" value="{{old('PatientDOB')}}" id="form3Example1cg" class="form-control form-control-lg" />
                  
                  <label class="form-label" for="form3Example1cg">Your Date of Birth</label>

                  @error('PatientDOB')
                     <span class="text-danger">{{$message}}</span>
                  @enderror 
                </div>

                <div class="form-outline mb-4">
                  <input type="text"  name="PatientUserName" value="{{old('PatientUserName')}}" id="form3Example1cg" class="form-control form-control-lg" />
                   
                  <label class="form-label" for="form3Example1cg">UserName</label>

                  @error('PatientUserName')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="password"  name="PatientPassword" value="{{old('PatientPassword')}}" id="form3Example4cg"  class="form-control form-control-lg" />
                  
                  <label class="form-label" for="form3Example4cg">Password</label>

                  @error('PatientPassword')
                     <span class="text-danger">{{$message}}</span>
                  @enderror 
                </div>

                

                <div class="d-flex justify-content-center">
                  <button type="submit" value="Register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login')}}" class="fw-bold text-body"><u>Login here</u></a></p>

                <input type="hidden" name="type_patient" value="PATIENT">

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>