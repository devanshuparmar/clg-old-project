<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css" >
            body{
                background-image:url('https://cdn11.bigcommerce.com/s-ka7ofex/images/stencil/2000x1000/uploaded_images/how-rfid-is-making-libraries-smarter.jpg?t=1580145106');
                /* background-color: indigo; */
                /* position:fixed; */
                margin:0;
            }
            .blur1{
                margin: 0;
                font-size:1.75em;
                padding: 0;
                backdrop-filter:blur(3px);
                -webkit-backdrop-filter:blur(3px);
                border: 1px solid indigo;
                color:black;
                width:100%;
                border-radius:20px;
                opacity: 1;
            }
            .trans1{
                margin: 0;  
                background-color: #ffffff;
                /* border: 1px solid black; */
                width:100%;
                /*border-radius:20px;*/
                opacity: 0.7;
            }
            h1{
                margin: 5%;					/*to show data in transparent box*/ 
                font-weight: bold;			/*concept(we must increase the z layer)*/ 
                color: black;				/*Color of the fonts*/
                
                margin-top: 0.51%;
                margin-bottom: 5px;
                border-style: solid;
                border-top: 0;
                border-left: 0;
                border-right: 0;
                font-size: 1.7em;
                text-shadow: 2px 2px grey;    
            }
            .topbar{
                position:relative;
                margin:0;
                margin-left:0.25%;
                top:0;
                width:99.5%;
                /* background:white; */
                height:50px;
            }
            .searchbar{
                width:69%;
                padding-left:1%;
                border-radius:10px;
                font-size:1.4rem;
                height: 2.4rem;
                margin:0.625rem;
            }
            .addNewLibrarian{
                position:absolute;
                top:0;
                width:17.75%;
                height:2.5rem;
                border-radius: 10px;
                margin-top:0.625rem;
                margin-left:71%;
            }
            .logout{
                position:absolute;
                top:0;
                width:8.75%;
                height:2.5rem;
                border-radius: 10px;
                margin-top:0.625rem;
                margin-left:90%;
            }
            @yield('css');
        </style>
            @yield('title');
    </head>
    <body oninit="noBack()">
    <?php 
        $userName = session('uname');
        $userId = session('uid');
        echo $userName;
        echo $userId;
    ?>
        <!-- <div class="fixed"> -->
            <center>
                <div class="blur1">
                    <div class="trans1">
                        <p style="font-size:3px"><br></p>
                        <h1>
                            Library Management System
                        </h1>
                        <!-- <marquee direction="left" style="font-size:25px;margin-bottom:5px;"><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, atque voluptatem vitae excepturi ipsam quasi, doloribus debitis earum, accusantium eaque nesciunt? Veniam delectus tenetur eos, maxime officia porro atque impedit?</b></marquee> -->
                    </div>
                </div>
            </center>
            <div class="topbar">
                <form action="/search-librarians" method="post">
                    <input class="searchbar" type="text" name="search" />
                </form>
                <a style="margin:0" href="/add-librarians"><button class="addNewLibrarian" style="font-weight:900;font-size:1.2rem">Add New Librarian</button></a>
                <a style="margin:0" href="/admin-logout"><button class="logout" style="font-weight:900;font-size:1.2rem;background:red">Logout</button></a>
            </div>

            @yield('content');

            <script>
                function noBack()
                {
                    window.history.forward();
                }
                window.onpaint = noBack();
            </script>
        <!-- </div> -->
    </body>
    @if($message=Session::get('failed'))
        <script>
            alert('{{$message}}')
        </script>
    @endif
    @if($message=Session::get('success'))
        <script>
            alert('{{$message}}')
        </script>
    @endif
</html>