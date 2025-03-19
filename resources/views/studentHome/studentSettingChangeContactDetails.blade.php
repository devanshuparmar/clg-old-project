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
<title>Student Corner | Settings | Make Changes</title>


@section('content')
<div class="trans1">
    <center>
        <h1>
            Edit Contact Details
        </h1>
    </center>
    <form method="post">
    @csrf
        <center>
            <table style="font-size:2rem;" cellspacing="10px" cellpadding="10px">
                <tr>
                    <td>
                        Contact Number :
                    </td>
                    <td>
                    @foreach($data as $data)
                        <input type="text" class="rounded" name="phNum" value="{{$data->contact_details}}" placeholder="+910123456789">
                    @endforeach
                    </td>
                </tr>
                <tr>
                    <td>
                        E-Mail Address :
                    </td>
                    <td>
                    <input type="hidden" name="studentId" value="{{$data->idstudents}}">
                        <input type="text" class="rounded" name="email" value="{{$data->email}}" placeholder="abc@gmail.com">
                    </td>
                </tr>
            </table>
            <input formaction="{{url('/student/settings')}}" class="rounded" type="submit" value="Back">
            <input formaction="{{url('/student/update-details')}}" class="submitRounded" type="submit" value="Submit" name="submit">
        </center>
    </form>
</div>

@endsection