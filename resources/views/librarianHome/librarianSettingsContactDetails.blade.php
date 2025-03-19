@extends('librarianHome.librarianSettings')

@section('contactDetails')
<table style="margin-right: 0rem; margin-top: 1.5rem; font-size: 1.5rem; font-weight: 500" align="left">
    <center>
        <tr>
            <td>
                E-Mail :
            </td>
            <td>
                <input class="rounded" type="email" placeholder="abc@gmail.com" name="email" value="">
            </td>
        </tr>
        <tr>
            <td>
                Contact Number :
            </td>
            <td>
                <input class="rounded" type="tel" placeholder="+919997773331" name="phoneNumber" value="">
            </td>
        </tr>
    </center>
</table>
    <button onclick="changePassword()" class="submit-contact">Submit</button>
@endsection