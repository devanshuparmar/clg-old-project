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
                    Log In or Sign Up as a student first to use our services.
                    <a href="{{ url('/home') }}" style="font-weight:900;text-decoration:none"><b> Log In here.</b></a> If you do not have an account  
                    <a href="{{ url('/homeSignup') }}" style="font-weight:900;text-decoration:none"><b>create one here</b></a>.
                </marquee>
            </b>
        </center>
    </div>
</center>
<center>
    <div class="transSignup container3">
        <table cellspacing="30px">
            <legend style="font-size:35px;font-weight:900">Sign Up</legend>
            <form action="/studentRegistration" method="POST">
            @csrf
                <tr>
                    <td>
                        <b style="font-size:25px;">
                            Name :
                        </b>
                    </td>
                    <td>
                        <input type="text" name="name" autofocus placeholder="firstname lastname" 
                            class="rounded"/>
                    </td>
                    <td>@error('name'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                                Enrolment Number :
                            </b>
                    </td>
                    <td>
                        <input type="text" name="enrollNo" placeholder="12 digit enrolment number" 
                                class="rounded"/>
                    </td>
                    <td>@error('enrollNo'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                            Course :
                        </b>
                    </td>
                    <td>
                        <select name="course" style="font-size:16pt;width:100pt;border-radius:20px;box-shadow: 2px 2px 3px #666">
                            <option value="IMCA">IMCA</option>
                            <option value="MCA">MCA</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                            <option value="MBA">MBA</option>
                        </select>
                    </td>
                    <td>@error('course'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                            Semester :
                        </b>
                    </td>
                    <td>
                        <select name="sem" style="font-size:16pt;width:100pt;border-radius:20px;box-shadow: 2px 2px 3px #666">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </td>
                    <td>@error('sem'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                            Division :
                        </b>
                    </td>
                    <td>
                        <select name="div" style="font-size:16pt;width:100pt;border-radius:20px;box-shadow: 2px 2px 3px #666">
                            <option value="ICA">ICA</option>
                            <option value="IET">IET</option>
                            <option value="IMS">IMS</option>
                        </select>
                    </td>
                    <td>@error('div'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                                Contact :
                            </b>
                    </td>
                    <td>
                        <input type="text" name="contact" placeholder="+910123456789" 
                                class="rounded"/>
                    </td>
                    <td>@error('contact'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                                E-Mail :
                            </b>
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="abc@gmail.com" 
                                class="rounded"/>
                    </td>
                    <td>@error('email'){{$message}}@enderror</td>
                </tr>
                <tr>
                    <td>
                        <b style="font-size:25px;">
                                Password :
                        </b>
                    </td>
                    <td>
                        <input type="password" name="password" 
                                class="rounded"/>
                    </td>
                    <td>@error('password'){{$message}}@enderror</td>
                </tr>

        </table>
    </div>
    <div class="container2">
        <p style="font-weight:900;">
            <a href="{{ url('/home') }}">
                Already a user? Login Here
            </a>
        </p>
            <input type="submit" name="submit" value="Submit" style="background-color:#4CAF50;margin-top:15px;margin-bottom:10%;font-size:16pt;width:150px;border-radius:25px;box-shadow: 2px 2px 3px #666;height:35px;"/>
        </form>   
    </div>
</center>
@endsection