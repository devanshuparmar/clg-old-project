@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>
    Librarian | Approving Students
</title>
@endsection

@section('css')
<style>

</style>
@section('content')

    <center>
        <table style="font-size:1.4rem;background:white" cellspacing="10px">
            <tr>
                <th>Student<br>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact<br>Details</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Divsion</th>
                <th>Enrollment<br>Number</th>
                <th colspan='2'>Operation</th>
            </tr>
            @foreach($data as $d)
            <tr>
                <td>{{$d->idstudents}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->contact_details}}</td>
                <td>{{$d->course}}</td>
                <td>{{$d->semester}}</td>
                <td>{{$d->division}}</td>
                <td>{{$d->enrollment_number}}</td>
                <td><a href="/approve/{{$d->idstudents}}"><button style="background:limegreen">Approve</button></a></td>
                <td><a href="/reject/{$d->idstudents}"><button style="background:red;color:white">Reject</button></a></td>
            </tr>
            @endforeach
        </table>
    </center>

@endsection