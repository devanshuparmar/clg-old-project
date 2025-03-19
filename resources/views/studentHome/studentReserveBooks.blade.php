@extends('studentHome.studentReserveBook')


@section('searchResults')
<div class="transs">
	<div class="blurs">
		<h4 align="center" style="margin-bottom: 1%;margin-top: 2%">Results</h4>
		<table style="width:99%;margin-left:0.5%;padding-bottom:0.5%;font-size:25px;" cellspacing="15px">
			<tr style="font-size:30px;">
				<th><center>BID</center></th>
				<th><center>Book Name</center></th>
				<th><center>Author Name</center></th>
				<th><center>Published By</center></th>
				<th><center>Number <br> Of Books</center></th>
				<th><center>Action</center></th>
			</tr>
				
			@foreach($data as $x)
			<tr>
				<td>
					<center><?php echo $x->id_books; ?></center>
				</td>
				<td><center id="id"><?php echo $x->name ?></center></td>
				<td><center id="id"><?php echo $x->author ?></center></td>
				<td><center id="id"><?php echo $x->publisher ?></center></td>
				<td><center id="id"><?php echo $x->number_of_books ?></center></td>
				<td><center>
					@if($x->number_of_books!=0)
					<button class="reserve-btn" id="<?php echo $x->id_books; ?>" onclick = "confirmReservation(this)"> 
						Reserve
					</button>
					@endif
					@if($x->number_of_books==0)
					<button id="<?php echo $x->id_books; ?>"> 
						Reserve
					</button>
					@endif
					</center>
				</td>
			</tr>
			@endforeach		
		</table>
	</div>
</div>
@endsection