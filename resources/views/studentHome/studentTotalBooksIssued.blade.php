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
				Total Books issued by you
			</h1>
			<table border="0" style="width:100%;font-size:25px;" cellspacing="2px" cellpadding="2px">
				<tr style="font-size:30px;background:black;color:white;">
					<th>BID</th>
					<th>Book Name</th>
					<th>Author Name</th>
					<th>Issued</th>
                    <th>Returned</th>
                    <th>Fined</th>
				</tr>
                <tr style="margin-top:50px;">
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td></td>
                </tr>
                <tr style="margin-top:50px;">
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                
				@foreach($issuedTotal as $x)
					<tr>
						<td>
							<center><?php echo $x->book_id; ?></center>
						</td>
						<td><center>{{$x->book_name}}</center></td>
						<td><center>{{$x->book_author}}</center></td>
						<td><center>{{$x->issue_date}}</center></td>
						<td><center>{{$x->return_date}}</center></td>
						@if($x->fined==0)
						<td><center>No</center></td>
						@else
						<td><center>{{$x->fined}}</center></td>
						@endif
					</tr>
				@endforeach
			</table>
		</center>	
	</div>
</div>
	
@endsection