@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>
    Librarian | Manage Books
</title>
@endsection

@section('css')
<style>
    .searchbar-manageBooks{
        z-index: 1;
        position: fixed;
        left: 45rem;
        margin: 1.7rem 0 0 1rem;
        padding: 0 0 0 2rem;
        font-size: 25px;
        width: 30rem;
        height: 3.5rem;
        border-radius: 15px;
        /* padding:10px; */
    }
    .btn-book{
        position: fixed;
        z-index: 1;
    }
    .searchbar-manageBooks:focus{
        font-size: 25px;
        border-radius: 15px;
        background-color: lightblue;
    }
    .blurs{
        position : fixed;
        left: 21%;
        margin: 0;
        padding: 0;
        /* margin-left: 22%; */
        width: 78%;
        height: 89%;
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
        font-size:1.75em;
        /* height:900px; */
        z-index: -1;
        right:0;
        overflow: auto;
    }
    .transs{
        position: fixed;
        background-color: #ffffff;
        opacity: 0.7;
        width: 78%;
        height: 89%;
        z-index: -1;
    }
    .container{
        position: relative;
        margin: 0;
        margin-top: 5.2%;
        margin-left: 21%;
        padding: 0;
        width: 76.5%;
        height: 78.9%;
        font-weight: 0;
        /* border-style: solid; */
    }
    .button{
        /* float: right; */
        z-index: 1;
        position: fixed;
        left: 22rem;
        margin: 1.5rem 0 0 0;
        background: blue;
        font-size: 25px;
        font-weight: 900;
        color: white;   
        height: 3.5rem;
        width: 23%;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 3.5rem;
        padding-right: 2.8rem;
        border-radius: 0.9375rem;
    }
    .button-edit{
        margin: 0 0 0 0;
        background: mediumseagreen;
        font-size: 10px;
        font-weight: 900;
        color: white;
        padding: 0;   
        height: 2.5rem;
        width: 100%;
        margin: 10px;
        /* border-radius: 25px; */
    }
    .button-remove{
        margin: 0 0 0 0;
        background: red;
        font-size: 8px;
        font-weight: 900;
        color: white;
        padding: 0;   
        height: 2.5rem;
        width: 100%;
        margin: 10px;
        /* border-radius: 25px; */
    }
    .button:hover{
        background: white;
        color: blue;
        border-style: solid;
        border-width: 5px;
        border-color: blue;
        padding-bottom: 2rem;
    }
    .hover:not(:hover){
        /* background: white; */
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
        opacity: 0.7;
        /* height: 20px; */
    }
    .button-edit:hover{
        background: white;
        color: black;
        padding: 0;
        border-style: solid;
        border-width: 5px;
        border-color: mediumseagreen;
        /* padding-bottom:40px; */
    }
    .button-remove:hover{
        background: white;
        color: black;
        padding: 0;
        border-style: solid;
        border-width: 5px;
        border-color: red;
        /* padding-bottom:40px; */
    }
    .btn-bookId{
        position: fixed;
        margin: 1rem 0 0 1rem;
        z-index: 1;
        left:49.6rem;
        background: rgb(68, 162, 188);
        font-size: 1.5rem;
        font-weight: 900;
        color: white;   
        height: 3rem;
        width: 3%;
        padding-top: 0.625rem;
        padding-bottom: 2.125rem;
        border-radius: 0.9375rem;
    }
    .btn-bookId:hover{
        background: white;
        color: rgb(68, 162, 188);
        border-color: rgb(68, 162, 188);
    }
    .btn-author{
        position: fixed;
        margin: 1rem 0 0 1rem;
        z-index: 1;
        left:52.8rem;
        background: rgb(68, 162, 188);
        font-size: 1.5rem;
        font-weight: 900;
        color: white;   
        height: 3rem;
        width: 7%;
        padding-top: 0.625rem;
        padding-bottom: 2.125rem;
        border-radius: 0.9375rem;
    }
    .btn-author:hover{
        background: white;
        color: rgb(68, 162, 188);
        border-color: rgb(68, 162, 188);
    }
    .btn-book{
        position: fixed;
        margin: 1rem 0 0 1rem;
        z-index: 1;
        left:59.5rem;
        background: rgb(68, 162, 188);
        font-size: 1.5rem;
        font-weight: 900;
        color: white;   
        height: 3rem;
        width: 7%;
        padding-top: 0.625rem;
        padding-bottom: 2.125rem;
        border-radius: 0.9375rem;
    }
    .btn-book:hover{
        background: white;
        color: rgb(68, 162, 188);
        border-color: rgb(68, 162, 188);
    }
</style>
@section('content')
<!-- <center> -->
    <div class="container">
        <div class="blurs">
            <div class="transs"></div>
        </div>
        <center>
            <!-- <h1 style="float: left;margin-left: 400px; font-size: 2.4rem;padding-top: -10px;">
                Manage Books :
            </h1> -->
        </center>
        <form action="/librarian/search-authors" method="POST">
        @csrf
            <input class="searchbar-manageBooks" type="text" name="searchbar" placeholder="Searchbar"/>
        <!-- <center style="z-index: 1;"> -->
            <input type="submit" value="go" hidden>
            <input type="button" onclick="addAuthor()" class="button" value="Add New Author" name="submit" id="You are going to add a new book"><br><br><br><br><br>
        </form>
        <!-- </center> -->
        @yield('view')
    </div>
    
<!-- </center> -->
