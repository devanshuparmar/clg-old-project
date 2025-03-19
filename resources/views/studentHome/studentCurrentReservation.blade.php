@extends('studentHome.studentLayout')
@section('css')
.trans3{
	background-color:white;
	opacity:0.7;
	border-radius:20px;
}
@endsection
@section('title')
<title>Student Corner | Total Books Issued</title>

@section('content')
<div class="trans3">
	<div class="blur1">
		<center>
			<h1 style="font-size: 1.2em;color:black">
				Books reserved by you
			</h1>
			<table border="0" style="width:100%;font-size:25px;" cellspacing="5px" cellpadding="2px">
				<tr style="font-size:30px;background:black;color:white;">
					<th>Reservation<br>Id</th>
					<th>Book Id</th>
					<th>Book Name</th>
					<th>Author Name</th>
					<th>Reserved On</th>
                    <th>Operation</th>
				</tr>
                <tr style="margin-top:50px;">
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr style="margin-top:50px;">
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            
				@foreach($data as $x)
					@if($x->cancelled==0 and $x->time<=10800)
						<tr>
							<td>
								<center><?php echo $x->reservation_id; ?></center>
							</td>
							<td><center>{{$x->book_id}}</center></td>
							<td><center>{{$x->book_name}}</center></td>
							<td><center>{{$x->book_author}}</center></td>
							<td><center>{{$x->reservation_time}}</center></td>
							<td><center><a href="/student/cancel-reservation/{{$x->reservation_id}}" style="border-radius:5px;color:red;padding:6px">Cancel</a></center></td>
						</tr>
					@endif
				@endforeach
			</table>
		</center>	
	</div>
</div>
	
@endsection