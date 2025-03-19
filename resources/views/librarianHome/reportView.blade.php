@extends('librarianHome.librarianMenuConnector');
@section('title')
<title>
    Librarian | Reports
</title>
@section('css')
<style>
    .container{
        position:relative;
        -webkit-backdrop-filter:blur(4px);
        padding:0;
        padding-left:1rem;
        margin-right:10px;
    }
    .back2{
        position:fixed;
        left:22%;
        top:12%;
        width:75%;
        height:40.3125rem;
        opacity:0.7;
        background:white;
        
    }
    .trans2{
        position:relative;
        -webkit-backdrop-filter:blur(10px);
        backdrop-filter:blur(10px);
        left:1.5%;
        top:12%;
        width:95%;
        height:40.3125rem;
    }
</style>
@section('content')
    <div class="back2">
    </div>
    <div class="trans2">
        <div class="container">
            <h1 style="font-size:3rem">
                Reports
            </h1>
            <br><br><br><br>
            <a style="margin-left:10px;font-size:1.5rem;color:black;visited-color:black" href="/transactions">Transactions</a>        <br><br>
            <a style="margin-left:10px;font-size:1.5rem;color:black;visited-color:black" href="/books-currently-issued">Current Issue</a>       <br><br>
            <a style="margin-left:10px;font-size:1.5rem;color:black;visited-color:black" href="/view-student">View Students</a>       <br><br>
            <a style="margin-left:10px;font-size:1.5rem;color:black;visited-color:black" href="/fined">Fined</a>

        </div>
    </div>

@endsection