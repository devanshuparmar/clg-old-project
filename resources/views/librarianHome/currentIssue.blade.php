@extends('librarianHome.librarianMenuConnector');
@section('title')
<title>
    Librarian | Reports | Books Currently Issued
</title>

@section('css')
<style>
.container{
    position:relative;
    left:22%;
    margin-top:5rem;
    width:78%;
    background:white;
}
</style>
@section('content')
<div class="container">
    <center>
        <table cellspacing="20px" style="font-size:1.4rem">
            <tr>
                <th><center>Issue<br>Id</center></th>
                <th><center>Issued<br>To</center></th>
                <th><center>Book<br>Name</center></th>
                <th><center>Author<br>Name</center></th>
                <th><center>Issue<br>Date</center></th>
                <th><center>Return<br>Date</center></th>
                <th><center>Fined</center></th>
            </tr>
            @foreach($data as $x)
                <tr>
                <td><center>{{$x->issue_id}}</center></td>
                <td><center>{{$x->student_id}}</center></td>
                <td><center>{{$x->book_name}}</center></td>
                <td><center>{{$x->book_author}}</center></td>
                <td><center>{{$x->issue_date}}</center></td>
                <td><center>{{$x->return_date}}</center></td>
                <td><center>{{$x->fined}}</center></td>
                </tr>
            @endforeach
        </table>
    </center>
</div>