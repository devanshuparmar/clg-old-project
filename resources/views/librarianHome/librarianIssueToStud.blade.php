@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>Librarian | Issuing Book</title>
@endsection

@section('css')
<style>
.blurs{
    margin: 0;
    padding: 0;
    width: 100%;
    -webkit-backdrop-filter: blur(4px);
    backdrop-filter: blur(4px);
    font-size:1.75em;
    /* height:900px; */
    right:0;  
}
.transs{
    margin: 0;  
    background-color: #ffffff;
    /* border: 1px solid black; */
    /*border-radius:20px;*/
    opacity: 0.7;
}
.container{
    padding: 0;
    padding-left: 20px;
    top: 30%;
    height: 600px;
}
.rounded
{
    font-size:16pt;
    border-radius:20px;
    box-shadow: 2px 2px 3px #666;
    padding-left: 10px;
}
.submitRounded{
	margin:10px;
	margin-left:40px;
	background-color:#1cac78;
	border-radius:15px;
	font-size:16pt;
	width:150px;	
}
.rounded:focus{
    font-size:16pt;
    border-radius:0px;
    background-color:lightblue;
    box-shadow: 2px 2px 3px #666;
    border-color: #339933;
}
</style>
@section('content')
    <div class="blurs">
        <div class="transs">
            <div class="container">
                <center>
                    <h1 style="text-decoration:underline">
                        Issuing books to students
                    </h1>
                    
                    <form action="/issue/book-to-student" method="post">
                    @csrf
                        <table style="font-size:1.5rem;padding-top:7%;" cellspacing="20px" cellpadding="10px">
                           <tr>
                                <td>
                                    <label>Book to be issued :</label>
                                </td>
                                <td>
                                    <input class="rounded" value="{{$bookId}}" type="text" value="<?php $bookName ?>" name="bookId" readonly>
                                </td>
                           </tr> 
                            <tr>
                                <td>
                                    <label>
                                        Issue To : 
                                    </label>
                                </td>
                                <td>
                                    <input class="rounded" type="text" name="studentId" placeholder="Enter the student's ID" required>
                                </td>
                            </tr>
                        </table>
                        <input id="studentId" class="submitRounded" type="submit" value="Submit" name="submit">
                    </form>
                </center>
            </div>
        </div>
    </div>
@endsection