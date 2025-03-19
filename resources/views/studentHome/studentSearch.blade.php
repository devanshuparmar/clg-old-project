@extends('studentHome.studentLayout')
@section('css')
.search{
	width:90%;
	height:220px;
}
.searchbar{
	font-size:25px;
	border-radius:15px;
	<!-- padding:10px; -->
}
.searchbar:focus{
	font-size:25px;
	border-radius:15px;
	background-color:lightblue;
}
.blurs{
    margin: 0;
    padding: 0;
    -webkit-backdrop-filter: blur(10px);
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
.authorSubmit{
	margin:10px;
	background-color:#1cac78;
	border-radius:15px;
	font-size:16pt;
	width:150px;
}
.bookSubmit{
	margin:10px;
	margin-left:40px;
	background-color:#1cac78;
	border-radius:15px;
	font-size:16pt;
	width:150px;	
}
.publisherSubmit{
	margin:10px;
	margin-left:40px;
	background-color:#1cac78;
	border-radius:15px;
	font-size:16pt;
	width:150px;	
}
@endsection

@section('title')
<title>Student Corner | Search</title>

@section('content')
<div class="transs">
	<div class="blurs">
		<div class="search">
			<br>
			<form method="">
				<table style="margin-left: 15.5%;" cellspacing="10px">
					<tr>
						<td>
							<label style="font-size:25px;">
								<b>Search for :</b>
							</label>
						</td>
						<td>
							<input class="searchbar" type="text" name="search" placeholder="Search Here" style="margin-left:10px;padding-left: 20px;" size="35pt"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							<b style="font-size:20px;">Search by :</b>
						</td>
						<td>
							<input formaction="{{url('/student/search/authors')}}" class="authorSubmit" type="submit" value="Author" name="author" >
							<input formaction="{{url('/student/search/books')}}" class="bookSubmit" type="submit" value="Book" name="book" />
							<input formaction="{{url('/student/search/publishers')}}" class="publisherSubmit" type="submit" value="Publisher" name="publisher" />
						</td>
					</tr>
				</table>
			</form>
		</div>	
	</div>
</div>

@yield('searchResults')
@endsection