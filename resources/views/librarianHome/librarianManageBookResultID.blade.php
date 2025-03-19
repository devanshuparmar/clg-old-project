@extends('librarianHome.librarianManageBooksLanding')

@section('view')
<center>
    <h1>
        Searched By Book ID
    </h1>
    <table style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        <tr>
            <th><center>BID</center></th>
            <th style="padding-left:2rem">Book Name</th>
            <th style="padding-left:0.5rem">Author Name</th>
            <th style="padding-right:0rem">Published By</th>
            <th><center>Operations</center></th>
        </tr>
    </table>
</center>
<center style="position: fixed; height: 545px; width: 76%; overflow: auto; overflow-x:hidden">
    <table style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
       
        <tr class="hover">
            <td style="padding-left: 1rem">
                <center><?php echo $books->id_books; ?></center>
            </td>
            <td ><center><?php echo $books->name; ?></center></td>
            <td><center><?php echo $books->author; ?></center></td>
            <td><center><?php echo $books->publisher; ?></center></td>
            <td><center><?php echo $books->number_of_books; ?></center></td>
            <td ><center><button id="<?php echo $books->id_books; ?>" class="button-edit" onclick="editBooks(id)">Edit</button></center></td>
            <td ><center><button id="<?php echo $books->id_books; ?>" class="button-remove" onclick="removeBooks(id)">Remove</button></center></td>
        </tr>

    </table>
</center>
@endsection