@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>Librarian | Collecting Book</title>
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
    margin-top: 15%;
    padding: 0;
    padding-left: 20px;
    top: 30%;
    height: 400px;
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
.button{
    border-color: black;
    background: #1cac78;
    /* color: white; */
    border-radius: 10px;
    padding: 5px;
}
</style>
@section('content')
    <div class="blurs">
        <div class="transs">
            <div class="container">
                <center>
                    <h1 style="text-decoration:underline">
                        Student has following books :
                    </h1>
                    
                    <form action="{{url('/librarian/home')}}">
                        <table cellspacing="10px" celpadding="10px" style="width:99%;margin-left:0.5%;padding-bottom:0.5%;font-size:25px;">
                            <tr style="font-size:30px;background:white;">
                                <th><center>Issue<br>Id</center></th>
                                <th><center>Book Id</center></th>
                                <th><center>Issue Time<br>& Date</center></th>
                                <th><center>Due Time<br>& Date</center></th>
                                <th style="background:white;"><center>Fined</center></th>
                                <th style="background:white;"><center>Collect</center></th>
                            </tr>
                                @foreach($data as $x)
                                    <tr>
                                        <td>
                                            <center> <?php echo $x->issue_id ?> </center>
                                        </td>
                                        <td><center>{{$x->book_id}}</center></td>
                                        <td><center>{{$x->issue_date}}</center></td>
                                        <td><center>{{$x->due_date}}</center></td>
                                        @if($x->fined==0)
                                        <td><center>No</center></td>
                                        @endif
                                        @if($x->fined!=0)
                                        <td><center>{{$x->fined}}</center></td>
                                        @endif
                                        <td style="background:white;">
                                            <center>
                                                <a class="button" href='/librarian/collect-book/{{$x->issue_id}}'>Collect
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </form>
                </center>
            </div>
        </div>
    </div>
@endsection