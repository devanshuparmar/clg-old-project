@extends('librarianHome.librarianIssueLanding')

@section('searchResults')
<div class="blurs">
	<div class="transs">
		<h4 align="center" style="margin-bottom: 1%;margin-top: 2%">Searched by Book ID</h4>
		<table style="width:99%;margin-left:0.5%;padding-bottom:0.5%;font-size:25px;">
			<tr style="font-size:30px;background:white;">
				<th><center>BID</center></th>
				<th><center>Book Name</center></th>
				<th><center>Author Name</center></th>
				<th><center>Published By</center></th>
				<th style="background:white;"><center>Issue</center></th>
			</tr>

				<tr>
					<td>
						<center><?php echo $books->id_books; ?></center>
					</td>
					<td><center><?php echo $books->name; ?></center></td>
					<td><center><?php echo $books->author; ?></center></td>
					<td><center><?php echo $books->publisher; ?></center></td>
					<td style="background:white;"><center><button id="<?php echo $books->id_books; ?>" onclick="selectBook(this)">Issue</button></center></td>
				</tr>

		</table>
	</div>
</div>
@endsection