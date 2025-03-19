@extends('home.home')
@section('css')

@endsection

@section('content')
<center>
<div class="transparent">
    <h1>
        <center>
            Library Management System
        </center>
    </h1>
    <center>
        <b style="font-size:25px">
            <marquee direction="left">
                Log In as a student first to use our services. If you do not have an account
                <a href="{{ url('/homeSignup')}}" style="font-weight:900;text-decoration:none"><b>create one here</b></a>.
            </marquee>
        </b>
    </center>
</div>
</center>
<center>
    <div class="transMenu container">
        <table cellspacing="30px">
            <legend style="font-size:35px;font-weight:900">Log In</legend>
            <form action="/student-login" method="POST">
            @csrf
                <tr>
                    <td>
                        <b style="font-size:25px;">
                            E-Mail :
                        </b>
                    </td>
                    <td>
                        <input type="text" name="email" autofocus placeholder="abc@gmail.com" 
                            class="rounded" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <b style="font-size:25px;">
                            Password :
                        </b>
                    </td>
                    <td>
                    <input type="password" name="password" placeholder="**********" 
                            class="rounded" required/>
                    </td>
                </tr>

        </table>
    </div>
    <div class="container2">
        <p style="font-weight:900;">
            <a href="{{ url('/homeSignup') }}">
                New User? Sign Up Here
            </a>
        </p>
                <input type="submit" name="submit" value="Submit" style="background-color:#4CAF50;margin-top:15px;font-size:16pt;width:150px;border-radius:25px;box-shadow: 2px 2px 3px #666;height:35px;"/>
            </form>   
    </div>            
    @if($message=Session::get('success'))
    <script>
        alert('{{$message}}')
    </script>
    @endif    
    @if($message=Session::get('failure'))
    <script>
        alert('{{$message}}')
    </script>
    @endif    
</center>
@endsection