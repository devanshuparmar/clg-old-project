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
        <b style="font-size:35px">
            LOGGING IN AS LIBRARIAN
        </b>
    </center>
</div>
</center>
<center>
    <div class="transMenu container">
        <table cellspacing="30px">
            <legend style="font-size:35px;font-weight:900">LogIn</legend>
            <form action="/login-as-lib" method="POST">
            @csrf
                <tr>
                    <td>
                        <b style="font-size:25px;">
                            E-Mail :
                        </b>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="abc@gmail.com" 
                            class="rounded"/>
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
                            class="rounded"/>
                    </td>
                </tr>

        </table>
    </div>
               <input type="submit" name="submit" value="Submit" style="background-color:#4CAF50;margin-top:15px;font-size:16pt;width:150px;border-radius:25px;box-shadow: 2px 2px 3px #666;height:35px;"/>
            </form>    
</center>
@endsection