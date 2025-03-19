@extends('studentHome.studentLayout')
@section('css')
.trans3{
	background-color:white;
	opacity:0.7;
	border-radius:20px;
}
@endsection
@section('title')
<title>Student Corner | Browse Books</title>

@section('content')
<div class="trans3">
	<div class="blur1">
		<center>
			<h1 style="font-size: 1.5em;color:black">
				Contents of Library
			</h1>
			<table border="0" style="width:100%;font-size:25px;" cellspacing="2px" cellpadding="2px">
				<tr style="font-size:30px;background:black;color:white;">
					<th>BID</th>
					<th>Book Name</th>
					<th>Author Name</th>
					<th>Published By</th>
					<th>Available</th>
				</tr>
				@foreach($data as $x)
					<tr>
						<td>
							<center><?php echo $x->id_books; ?></center>
						</td>
						<td><center><?php echo $x->name ?></center></td>
						<td><center><?php echo $x->author ?></center></td>
						<td><center><?php echo $x->publisher ?></center></td>
						<td><center><?php if($x->number_of_books!=0){
							echo $x->number_of_books;
						}else{
							echo 'No';
						}
						 ?></center></td>
					</tr>
				@endforeach
			</table>
		</center>	
	</div>
</div>
	
@endsection