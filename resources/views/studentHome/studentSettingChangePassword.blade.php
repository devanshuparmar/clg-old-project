@extends('studentHome.studentSetting')
@section('css')
.rounded
{
    font-size:16pt;
    border-radius:20px;
    min-width:150px;
    box-shadow: 2px 2px 3px #666;
    padding-left: 10px;
}
.submitRounded{
    background-color:#4CAF50;
    margin-left:20px;
    margin-top:15px;
    margin-bottom:15px;
    font-size:16pt;
    width:150px;
    color:white;
    border-radius:25px;
    box-shadow: 2px 2px 3px #666;
}
@endsection

@section('title')
<title>Student Corner | Settings | Change Password</title>


@section('content')
<div class="trans1">
    <center>
        <h1>
            Change Password
        </h1>
    </center>
    <form method="post">
    @csrf
        <center>
            <table style="font-size:2rem;" cellspacing="10px" cellpadding="10px">
                <tr>
                    <td>
                        Current Password :
                    </td>
                    <td>
                    @foreach($data as $data)
                        <input type="text" class="rounded" name="studentId" value="{{$data->idstudents}}" hidden>
                        <input type="text" class="rounded" name="name" value="{{$data->name}}" hidden>
                        <input type="text" class="rounded" name="enrollNo" value="{{$data->enrollment_number}}" hidden>
                        <input type="text" class="rounded" name="course" value="{{$data->course}}" hidden>
                        <input type="text" class="rounded" name="div" value="{{$data->division}}" hidden>
                        <input type="text" class="rounded" name="sem" value="{{$data->semester}}" hidden>
                        <input type="text" class="rounded" name="contact" value="{{$data->contact_details}}" hidden>
                        <input type="text" class="rounded" name="email" value="{{$data->email}}" hidden>
                        <input type="text" class="rounded" name="oldPasswd" value="{{$data->password}}" hidden>
                        <input type="password" class="rounded" name="password" placeholder="Enter current password">
                    @endforeach
                    </td>
                    <td style="font-size: 20px">
                        @error('password'){{$message}}@enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        New Password :
                    </td>
                    <td>
                        <input type="password" class="rounded" name="newPassword" value="" placeholder="Enter New Password">
                    </td>
                    <td style="font-size: 20px">
                    @error('newPassword'){{$message}}@enderror
                    </td>
                </tr>
            </table>
            <input formaction="{{url('/student/settings')}}" class="rounded" type="submit" value="Back">
            <input formaction="/student/update/password" class="submitRounded" type="submit" value="Submit" name="submit">
        </center>
    </form>
</div>

@endsection