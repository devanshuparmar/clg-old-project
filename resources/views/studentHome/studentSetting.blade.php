@extends('studentHome.studentLayout')
@section('css')
img {
    border-radius: 8px;
    height:400px;
    width:400px;
}
.total-books-box{
    position:relative;
    left:1%;
    max-width:40%;
    border-style:solid;
    border-color:red;
}
.current-books-box{
    position:relative;
    right:0;
    max-width:40%;
    border-style:solid;
    border-color:red;
}
.box{
    <!-- display: inline-block; -->
    width:100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-style:solid;
    background-color:turquoise;
    border-radius: 20px;
    margin:0;
}
.box1 {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-style:solid;
    background-color:#FEE715FF;
    border-radius:20px;
    border-size:20px;
    <!-- padding:10px; -->
    <!-- margin: 10px; -->
}

.box2 {
    <!-- display: inline-block; -->
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-style:solid;
    background-color:#3f681c;
    border-size:20px;
    <!-- padding:10px; -->
    <!-- margin: 10px; -->
    font-weight:600;
    border-radius:20px;
}

@endsection

@section('title')
<title>Student Corner | Settings</title>


@section('content')
<center>
    <!-- <div class="child">
        <center>
            <h1>Some Basic Text</h1>        
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nostrum, ratione quidem similique quibusdam repudiandae laborum repellendus! Facere fugiat odio quasi nesciunt aut debitis voluptatem dignissimos. Aperiam necessitatibus aliquid tempore?
            </p>
        </center>
    </div> -->
    <a href="/student/settings/changeContactDetails/{{session()->get('uname')}}">
        <div class="box">
            <center>
                <p style="margin:0;padding-left:5px;padding-right:5px">
                    Change Contact Details
                </p>        
                    <!-- <p style="font-size:40px">
                        40
                    </p>
                <h3>
                    Books Issued    
                </h3> -->
            </center>
            @yield('contactDetails')
        </div>
    </a>
    <a href="/student/settings/changePassword/{{session()->get('uname')}}">
        <div class="box1">
            <center>
                <p style="margin:0;padding-left:5px;padding-right:5px">
                    Change Password
                </p>        
                    <!-- <p style="font-size:40px">
                        3
                    </p>
                <h3>
                    Books Issued
                </h3> -->
            </center>
            @yield('passwd')
        </div>
    </a>
    <a href="{{url('/student/logout')}}">
        <div class="box2">
            <center> 
                <p style="margin:0;padding-left:5px;padding-right:5px">
                    Logout
                </p>
                <!-- <p style="font-size:40px">
                        2
                    </p>
                <h3>
                    Books Reserved
                </h3> -->
                <!-- <p style="color:#3f681c">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis unde quo, deleniti veniam assumenda cupiditate, error ut obcaecati placeat rerum provident amet?
                </p> -->
            </center>
        </div>
    </a>
</center>
@if($message=Session::get('success'))
    <script>
        alert('{{$message}}')
    </script>
@endif

@endsection