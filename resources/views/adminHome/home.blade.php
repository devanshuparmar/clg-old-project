@extends('adminHome.layout');
@section('title');
    <title>
        Admin | Home
    </title>
@endsection

@section('content');
<center>
    <table border="2" style="background:white;font-size:1.5rem;width:99%;margin-left:0.5%" cellspacing="10px" cellpadding="10px">
        <tr>
            <th> Librarian Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan='2'>Operations</th>
        </tr>
        @foreach($data as $x)
            <tr>
                <td><center>{{$x->lib_id}}</center></td>
                <td><center>{{$x->name}}</center></td>
                <td><center>{{$x->email}}</center></td>
                <td><center>{{$x->password}}</center></td>
                <td style="3rem"><center><a href="/edit-lib/{{$x->lib_id}}"><button style="width:100%;margin:0;border-radius:10px;background:green;color:white;font-size:1.5rem">Edit</button></a></center></td>
                <td style="3rem"><center><a href="/remove-lib/{{$x->lib_id}}"><button style="width:100%;margin:0;border-radius:10px;background:red;color:white;font-size:1.5rem">Remove</button></a></center></td>
            </tr>
        @endforeach
    </table>
</center>
@endsection