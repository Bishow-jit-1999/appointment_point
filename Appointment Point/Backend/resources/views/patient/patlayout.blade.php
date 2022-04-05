<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="{{asset('bootstrap-css')}}">
    <link rel="stylesheet" href="{{asset('admin.css')}}">
    <script src="{{asset('admin.js')}}"></script>
    <script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>



<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{asset('https://bryanrojasq.wordpress.com')}}">
                <img src="{{asset('image/Logo.png')}}" alt="LOGO" width=75px height=75px>
            </a>
        </div>
        <!-- Top Menu Items -->
        
        <ul class="nav navbar-right top-nav">
            <li>
                <a href="{{route('patient.logout')}}"><i class="fa fa-sign-out"></i> LOG OUT</a>
             </li>            
           
        </ul>

        <ul class="nav navbar-right top-nav">
            <li>
                <a href="{{route('patient.home')}}"><i class="fa fa-user" aria-hidden="true"></i>PATIENT ACCOUNT</a>
             </li>            
           
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                <a href="{{route('patient.doctor.view')}}"><i class="fa fa-book" aria-hidden="true"></i>BOOK APPOINTMENT</a>
                </li>
                <li>
                 <a href="{{route('patient.view.myappointment')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>MY APPOINTMENTS</a>
                </li>
                <li>
                    <a href="{{route('patient.view.myprofile')}}"><i class="fa fa-user" aria-hidden="true"></i> MY PROFILE</a>
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
    
</body>


</html>