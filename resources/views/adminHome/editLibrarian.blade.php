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
            input{
                font-size:25px;
            }
        </style>
        <title>Admin | Edit Librarian</title>
    </head>
    <body oninit="noBack()">
        <?php 
            $userName = session('uname');
            $userId = session('uid');
            echo $userName;
            echo $userId;
        ?>
        <center>
            <div class="blur1">
                <div class="trans1">
                    <p style="font-size:3px"><br></p>
                    <h1>
                        Library Management System
                    </h1>
                    <marquee direction="left" style="font-size:25px;margin-bottom:5px;"><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, atque voluptatem vitae excepturi ipsam quasi, doloribus debitis earum, accusantium eaque nesciunt? Veniam delectus tenetur eos, maxime officia porro atque impedit?</b></marquee>
                </div>
            </div>
        </center>

        <center>
                <form action="/update-lib" method="post">
                @csrf
            <table style="background:white;margin-top:5rem;font-size:25px">
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <input type="hidden" name="id" value="{{$data->lib_id}}">
                            <input type="text" name="name" value="{{$data->name}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E-Mail :
                        </td>
                        <td>
                            <input type="email" name="email" value="{{$data->email}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password :
                        </td>
                        <td>
                            <input type="password" name="password" value="{{$data->password}}" required>
                        </td>
                    </tr>
            </table>
                <input type="submit" name="submit" value="Submit">
                </form>
                <a href="/home-admin"><button style="font-size:20px;margin-top:5px">Back</button></a>
        </center>

        <script>
            function noBack()
            {
                window.history.forward();
            }
            window.onpaint = noBack();
        </script>
    </body>
</html>