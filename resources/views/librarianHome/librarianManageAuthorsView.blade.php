@extends('librarianHome.librarianManageAuthors')

@section('view')
<center>
    <!-- <table border=2 style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        
    </table> -->
</center>
<center style="position: fixed; height: 600px; width: 76%; overflow: auto; overflow-x:hidden">
    <table style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        <tr>
            <th width="20%">Author ID</th>
            <th>Author Name</th>
            <th colspan="2">Operations</th>
        </tr>
        @foreach($data as $author)
            <tr class="hover">
                <td style="padding-left: 1rem">
                    <center><?php echo $author -> author_id; ?></center>
                </td>
                <td style="padding-left: 0.5rem"><center><?php echo $author ->author_name ?></center></td>
                
                <td ><center><button id="<?php echo $author -> author_id ?>" class="button-edit" onclick="editAuthors(id)">Edit</button></center></td>
                <td ><center><button id="<?php echo $author -> author_id ?>" class="button-remove" onclick="removeAuthors(id)">Remove</button></center></td>
            </tr>
        @endforeach
    </table>
</center>
@endsection