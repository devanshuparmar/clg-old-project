@extends('librarianHome.librarianMenuConnector')
@section('title')
<title>
    Librarian | Collecting Book
</title>
@endsection

@section('css')
<style>
.search{
	width:90%;
	height:300px;
}
.searchbar{
	font-size:25px;
	border-radius:15px;
	/* padding:10px; */
}
.searchbar:focus{
	font-size:25px;
	border-radius:15px;
	background-color:lightblue;
}
.blurs{
    margin: 0;
    padding: 0;
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
.studentIdSubmit{
	margin:10px;
	margin-left:2.4375rem;
	background-color:#1cac78;
	border-radius:15px;
	font-size:16pt;
	width:9.375rem;	
}
button{
    width: 6.25rem;
    font-size: 1.25rem;
    height: 1.87rem;
    border-color: black;
    background: #1cac78;
    /* color: white; */
    border-radius: 10px;
    padding-bottom: 25px;
}
</style>
@section('content')
<div class="blurs">
	<div class="transs">
		<div class="search">
			<br>
            <h1 style="padding-top:0;margin-top:10px;">
                <center>
                    Collecting Book
                </center>
            </h1>
			<form method="post" action="/librarian/collect/students/books">
			@csrf
				<table style="margin-left: 15.5%;" cellspacing="10px">
					<tr style="background:white;">
						<td>
							<label style="font-size:25px;">
								<b>Student ID :</b>
							</label>
						</td>
						<td>
							<input class="searchbar" type="text" name="search" placeholder="Enter Student's ID here " style="margin-left:10px;padding-left: 20px;" size="35pt"/>
						</td>
					</tr>
					<tr style="background:white;">
						<td align="right">
							<!-- <b style="font-size:20px;">Search by :</b> -->
						</td>
						<td>
                            <br>
							<input class="studentIdsubmit" type="submit" value="Go" name="studentId" />	
						</td>
					</tr>
				</table>
			</form>
		</div>	
	</div>
</div>

@yield('searchResults')
@endsection