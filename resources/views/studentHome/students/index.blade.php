@extends('students.layout')

@section('content')
<!-- <h1>Library Management System</h1> -->
<div class="pull-left">
    <h2>
        Student CRUD Step By Step
    </h2>
</div>
<div class="row">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-success" href="{{route('students.create')}}">
                Create New Student
            </a>
        </div>    
    </div>
</div>

@if($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>

@endif
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Course/Sem</th>
            <th>Division</th>
            <th>Enrollment Number</th>
            <th>E-Mail</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>

        @foreach($students as $student)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$student->Name}}</td>
            <td>{{$student->Course/Sem}}</td>
            <td>{{$student->Division}}</td>
            <!-- <td>{{$student->Enrollment_Number}}</td> -->
            <td>{{$student->E-Mail}}</td>
            <td>{{$student->Password}}</td>
            <td>
                <form action="{{route('students.destory',$student->id)}}" method="POST">
                    <a class="btn btn-info" href="{{route('students.show',$student->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>