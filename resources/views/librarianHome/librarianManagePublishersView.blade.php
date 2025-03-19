@extends('librarianHome.librarianManagePublishers')

@section('view')
<center>
    <!-- <table border=2 style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        
    </table> -->
</center>
<center style="position: fixed; height: 650px; width: 76%; overflow: auto; overflow-x:hidden">
    <table style="width:98%;margin-left:0%;padding-bottom:0.5%;font-size:25px;">
        <tr>
            <th width="20%">Publisher ID</th>
            <th>Publisher Name</th>
            <th colspan="2">Operations</th>
        </tr>
        @foreach($data as $author)
            <tr class="hover">
                <td style="padding-left: 1rem">
                    <center><?php echo $author -> publisher_id; ?></center>
                </td>
                <td style="padding-left: 0.5rem"><center><?php echo $author ->publisher_name ?></center></td>
                
                <td ><center><button id="<?php echo $author -> publisher_id ?>" class="button-edit" onclick="editPublishers(id)">Edit</button></center></td>
                <td ><center><button id="<?php echo $author -> publisher_id ?>" class="button-remove" onclick="removePublishers(id)">Remove</button></center></td>
            </tr>
        @endforeach
    </table>
</center>
@endsection