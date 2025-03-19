@extends('librarianHome.librarianSettings')

@section('contactDetails')
<td></td>
<table align="right" style="margin-right: 2.8rem; margin-top: 1.5rem; font-size: 1.5rem; font-weight: 500">
    <center>
        <tr>
            <td>
                E-Mail :
            </td>
            <td>
                <input class="rounded" type="password" placeholder="Enter Current Password" name="oldPassword">
            </td>
        </tr>
        <tr>
            <td>
                Contact Number :
            </td>
            <td>
                <input class="rounded" type="password" placeholder="Enter New Password" name="newPassword">
            </td>
        </tr>
        <button onclick="changePassword()" class="submit-password">Submit</button>
    </center>
</table>
@endsection