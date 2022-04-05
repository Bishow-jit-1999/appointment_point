<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Point</title>


   <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="{{asset('login.CSS')}}">
   <script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>

<!------ Include the above in your HEAD tag ---------->
</head>

<body>



<h1 class="display-4" style="text-align:center"> Appointment Point </h1>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
   
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ6-IWIzvvi3l0tWgoqbtbQN6gukza_fYICg&usqp=CAU')}}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="{{route('login.submit')}}"  method="post">
       {{csrf_field()}}
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="USERNAME">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="PASSWORD">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="{{route('patient.reg')}}">Create Account</a>
    </div>

  </div>
</div>
    
</body>
</html>