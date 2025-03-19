@extends('studentHome.studentSearch')

@section('searchResults')
<div class="transs">
	<div class="blurs">
		<h4 align="center" style="margin-bottom: 1%;margin-top: 2%">Searched by Authors</h4>
		<table style="width:99%;margin-left:0.5%;padding-bottom:0.5%;font-size:25px;">
			<tr style="font-size:30px;">
				<th><center>BID</center></th>
				<th><center>Book Name</center></th>
				<th><center>Author Name</center></th>
				<th><center>Published By</center></th>
				<th><center>Available</center></th>
			</tr>
			@for ($x=1; $x <= 5; $x++)
				<tr>
					<td>
						<center><?php echo $x; ?></center>
					</td>
					<td><center>R.D. Sharma</center></td>
					<td><center>R.D. Sharma</center></td>
					<td><center>R.D. Sharma</center></td>
					<td><center>Yes / No</center></td>
				</tr>
			@endfor
		</table>

	</div>
</div>
	
@endsection