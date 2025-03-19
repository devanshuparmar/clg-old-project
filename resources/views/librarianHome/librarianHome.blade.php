<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian | Home</title>
    <style>
        body{
            margin: 0;
            background-image:url('https://cdn11.bigcommerce.com/s-ka7ofex/images/stencil/2000x1000/uploaded_images/how-rfid-is-making-libraries-smarter.jpg?t=1580145106');
        }
        .container{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 550px;
            width: 100%;
            background: #666666;
            align: center;
        }
        .blur{
            -webkit-backdrop-filter: blur(4px);
            backdrop-filter: blur(4px);
            margin-top:4%;
        }
        .blurTop{
            -webkit-backdrop-filter: blur(4px);
            backdrop-filter: blur(4px);
            /* margin: 2% 0 0 0; */
        }
        .trans{
            opacity : 0.9;
        }
        .header{
            margin: 0;
            background: #000000;
            font-size: 3rem;
            color: white;
            padding-top: 0.5%;
            padding-left: 3.5%;
            padding-bottom: 1%;
        }
        .menu{
            position: fixed;
            top: 23.5%;
            left: 20%;
            width: 60%;
            /* margin: 10px; */
            /* padding: 10px; */
        }
        .menu a{
            text-decoration: none;
        }
        .menu a:visited{
            text-decorattion: none;
        }
        .box1{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align: center;
            height: 8rem;
            width: 40%;
            background: coral;
            color: white;
            border-radius: 10px;
            margin: 1rem;
        }
        .box2{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align: center;
            height: 8rem;
            width: 40%;
            background: cornflowerblue;
            color: white;
            border-radius: 10px;
            margin: 1rem;
        }
        .box3{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align: center;
            height: 8rem;
            width: 40%;
            background: mediumseagreen;
            color: white;
            border-radius: 10px;
            margin: 1rem;
        }
        .box4{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align: center;
            height: 8rem;
            width: 40%;
            background: goldenrod;
            color: white;
            border-radius: 10px;
            margin: 1rem;
        }
        .box5{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align: center;
            height: 8rem;
            width: 40%;
            background: slateblue;
            color: white;
            border-radius: 10px;
            margin: 1rem;
        }
        .box6{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align: center;
            height: 8rem;
            width: 40%;
            background: maroon;
            color: white;
            border-radius: 10px;
            margin: 1rem;
        }
        .box1:hover{
            background: white;
            color: black;
            color: coral;
            border-style: solid;
            border-color: coral;
            border-width:5px;
        }
        .box2:hover{
            background: white;
            color: black;
            color: cornflowerblue;
            border-style: solid;
            border-color: cornflowerblue;
            border-width:5px;
        }
        .box3:hover{
            background: white;
            color: black;
            color: mediumseagreen;
            border-style: solid;
            border-color: mediumseagreen;
            border-width:5px;
        }
        .box4:hover{
            background: white;
            color: black;
            color: goldenrod;
            border-style: solid;
            border-color: goldenrod;
            border-width:5px;
        }
        .box5:hover{
            background: white;
            color: black;
            color: slateblue;
            border-style: solid;
            border-color: slateblue;
            border-width:5px;
        }
        .box6:hover{
            background: white;
            color:black;
            color: maroon;
            border-style: solid;
            border-color: maroon;
            border-width:5px;
        }
        .hover1{
            background:white;
            font-size:1.5rem;
            text-decoration:none;
            padding:10px;
        }
        .hover1:hover{
            background:black;
            color:white;
        }
    </style>
</head>
<body>
    <div class="blurTop">
        <div class="trans">
            <h1 class="header">
                Librarian's Home :
            </h1>
        </div>
    </div>
    <center>
        
        @if($number != 0)
            <a href="/approve-students" class="hover1">{{$number}} New students registered. Give approval if they are from your college.</a>
        @else
            <a class="hover1">No New students registered</a>
        @endif
        <div class="blur">
            <div class="trans">
                <div class="container">
                </div>
            </div>
        </div>
        <div class="menu">
            <a href="{{url('/librarian/issue/books')}}">
                <div class="box1">
                    <h1>Issue</h1>
                </div>
            </a>
            <a href="{{url('/librarian/collect')}}">
                <div class="box2">
                    <h1>Collect</h1>
                </div>
            </a>

            <br>
            
            <a href="{{url('/librarian/manageBook')}}">
                <div class="box3">
                    <h1>Manage</h1>
                </div>
            </a>
            <!-- <a href="{{url('/librarian/reports')}}">
                <div class="box4">
                    <h1>Reports</h1>
                </div>
            </a> -->

            <br>
            
            <a href="{{url('/librarian/settings')}}">
                <div class="box5">
                    <h1>Settings</h1>
                </div>
            </a>
            <a href='/librarian/logout'>
                <div class="box6">
                    <h1>Logout</h1>
                </div>
            </a>
        </div>
    </center>
    @if($message=Session::get('success'))
        <script>
            alert('{{$message}}')
        </script>
    @endif

</body>
</html>