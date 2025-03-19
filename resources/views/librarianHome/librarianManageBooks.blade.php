@extends('librarianHome.librarianManageBooksLanding')

@section('view')

<center>
    <table style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        
    </table>
</center>
<center style="position: fixed; height: 600px; width: 76%; overflow: auto; overflow-x:hidden">
    <table style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        <tr>
            <th><center>BID</center></th>
            <th>Book Name</th>
            <th>Author <br> Name</th>
            <th>Published <br> By</th>
            <th>No. Of <br> Books</th>
            <th colspan="2"><center>Operations</center></th>
        </tr>
        @foreach($books as $x)
            <tr class="hover">
                <td style="padding-left: 1rem">
                    <center><?php echo $x->id_books; ?></center>
                </td>
                <td ><center><?php echo $x->name; ?></center></td>
                <td><center><?php echo $x->author; ?></center></td>
                <td><center><?php echo $x->publisher; ?></center></td>
                <td><center><?php echo $x->number_of_books; ?></center></td>
                <td ><center><button id="<?php echo $x->id_books; ?>" class="button-edit" onclick="editBooks(id)">Edit</button></center></td>
                <td ><center><button id="<?php echo $x->id_books; ?>" class="button-remove" onclick="removeBooks(id)">Remove</button></center></td>
            </tr>
        @endforeach
    </table>
</center>
@endsection
