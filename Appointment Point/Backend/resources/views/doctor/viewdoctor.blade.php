@extends('admin.layout')
@section('content')

<table class="table table-striped">
    
    <tr>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Doctor Department</th>
        <th scope="col">Doctor Contact</th>
        <th scope="col">Doctor Email</th>
        <th scope="col">Doctor Username</th>
        <th>Actions</th>
        <th></th>
        
    </tr>
    
    @foreach($doctors as $d)
    <tr> 
        <td>{{($d->ID)}}</td>
        <td>{{($d->NAME)}}</td>
        <td>{{($d->DEPT)}}</td>
        <td>{{($d->CONTACT)}}</td>
        <td>{{($d->EMAIL)}}</td>
        <td>{{($d->USERNAME)}}</td>
        <td><a href="{{route('admin.doctor.edit',['id'=>$d->ID])}}"><button class="btn btn-primary">Edit Info</button></a></td>
        <td><a href="{{route('admin.doctor.delete',['id'=>$d->ID ,'username'=>$d->USERNAME])}}"><button class="btn btn-danger">Remove</button></a></td>
    </tr>
    @endforeach
</table>

@endsection