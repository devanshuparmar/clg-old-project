@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>
    Librarian | Manage Books | Add New Publisher
</title>
@endsection

@section('css')
<style>
    .blurs{
        margin: 0;
        padding: 0;
        /* margin-left: 22%; */
        width: 100%;
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
        font-size:1.75em;
        /* height:900px; */
        right:0;  
    }
    .transs{
        position: relative;
        background-color: #ffffff;
        opacity: 0.8;
        height: 100%;
    }
    .container{
        position: relative;
        margin: 0;
        margin-top: 5.2%;
        margin-left: 21%;
        padding: 0;
        width: 76.5%;
        height: 78.9%;
        /* border-style: solid; */
    }
    .rounded{
        font-size:25px;
        border-radius:15px;
        width: 20.3125rem;
        padding-left:10px;
    }
    .rounded:focus{
        border-radius: 0;
    }
    .button{
        width: 12rem;
        font-size: 1.25rem;
        height: 2.5rem;
        border-color: black;
        background: #1cac78;
        /* color: white; */
        border-radius: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
@section('content')
<!-- <center> -->
    <div class="container">
        <div class="blurs">
            <div class="transs">
                <center>
                    <form action="/librarian/add/publisher" method="POST">
                    @csrf
                        <table style="font-size: 1.8rem" cellspacing="20px">
                            <label for="table" style="font-weight: 550;font-size: 2.5rem;">
                                Add New Publisher
                            </label>
                            <br>
                            <tr><br></tr>
                            <tr>
                                <td>
                                    Name :
                                </td>
                                <td>
                                    <input class="rounded" type="text" name="publisherName" placeholder="Enter Publisher's name" autofocus required>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="button" value="Add New Publisher">
                    </form>
                </center>
            </div>
        </div>
    </div>
<!-- </center> -->
