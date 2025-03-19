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
            .blur2{
                margin: 0;
                padding: 0;
                backdrop-filter:blur(3px);
                -webkit-backdrop-filter: blur(4px);
                font-size:1.75em;
                /* width:80%; */
                margin-left:21%;
                /* height:900px; */
                right:0;
                
            }
            .trans1{
                margin: 0;  
                background-color: #ffffff;
                /* border: 1px solid black; */
                width:100%;
                /*border-radius:20px;*/
                opacity: 0.7;
            }
            .trans2{
                margin: 0;
                padding:0;
                /* background-color: #ffffff; */
                /* border: 1px solid black; */
                /* width:; */
                /* max-width:900px; */
                shadow: 2px 2px 0 0; 
                /* border-radius:20px; */
                /* backdrop-filter:blur(10px); */
                /* opacity: 0.7; */
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
            .container{
                /* display: -webkit-flex; */
                display: grid;
                position: absolute;
                /* padding:20px; */
                /* border-style:solid; */
                width: 20%;
                /* border-color:green; */
                /* min-height:350px; */
                opacity: 100%;
                oveflow: auto;
            }
            .grid-container--fit {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            }
            .grid-element {
                background-color: grey;
                padding: 0px;
                padding-top:10px;
                color: #fff;
                border: 1px solid #fff;
            }
            .grid-element:hover{
                background-color: #f2f2f2;
            }
            .con1{
                position:relative;
                width:40px;
                border-style:solid;
                border-color:indigo;

            }
            .container b{
                font-size:25px;
                /* width:40px; */
                /* background-color:grey; */
                opacity:100%;
                padding:0px;
                oveflow:auto;
            }
            .containerMain{
                position:relative;
                top:0px;
                left:5%;
                width:90%;
                /* border-style:solid; */
            }
            .notif-container{
                font-weight:900;
                padding:2px;
            }
            .container-warning{
                /* background-color:white; */
                position:relative;
                top:0px;
                left:2.5%;
                padding:5px;
                margin-top:8px;
                border-style:dashed;
                border-color: yellow;
                width:95%;
                max-wdith:100%;
                backdrop-filter:blur(40px);
                /* padding:5px; */
            }
            .warning-content{
                background-color:yellow;
                backdrop-filter:brightness(1.5);
                padding:5px;
                padding-left:25px;
                font-size:20px;
                opacity: 1;
            }
            .container-reminder{
                /* background-color:white; */
                position:relative;
                top:0px;
                left:2.5%;
                padding:5px;
                border-style:dashed;
                border-color: blue;
                width:95%;
                max-wdith:100%;
                backdrop-filter:blur(40px);
                /* opacity:0.7; */
                /* padding:5px; */
            }
            .reminder-content{
                background-color:hsl(202, 68%, 62%);
                backdrop-filter:brightness(1.5);
                padding:5px;
                padding-left:25px;
                font-size:20px;
                opacity:1;
            }
            .container-danger{
                /* background-color:white; */
                position:relative;
                top:0px;
                left:2.5%;
                padding:5px;
                margin-top:8px;
                border-style:dashed;
                border-color: red;
                width:95%;
                max-wdith:100%;
                backdrop-filter:blur(40px);
                /* opacity:0.7; */
                /* padding:5px; */
            }
            .danger-content{
                background-color:rgb(212, 69, 69);
                backdrop-filter:brightness(1.5);
                padding:5px;
                padding-left:25px;
                font-size:20px;
                opacity:1;
            }
            a{
                text-decoration:none;
                color:black;
                padding:20px;
            }
            #navbar{
                background-color:"white";
            }
            .sticky {
                position: fixed;
                top: 20px;
                left:0.5%;
                width: 20%;
            }
            .sticky + .content {
                padding-top: 400px;
            }
            h1{
                margin: 5%;                 /*to show data in transparent box*/ 
                font-weight: bold;          /*concept(we must increase the z layer)*/ 
                color: black;               /*Color of the fonts*/
                
                margin-top:0;
                margin-bottom:5px;
                border-style:solid;
                border-top:0;
                border-left:0;
                border-right:0;
                font-size:2em;
                text-shadow:2px 2px grey;
            }
            @yield('css');
            @yield('title');
        </style>
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

                        <marquee direction="left" style="font-size:25px;margin-bottom:5px;"><b>If you are late to return the book you will be fined Rs. 10 / Day.</b></marquee>
                    </div>
                </div>
            </center>    
            <br><br>
            <!-- <div class="notif-container">
                <div class="container-reminder">
                    <div class="reminder-content">
                        Currently no book reserved.
                    </div>
                </div>
                
                <div class="container-warning">
                    <div class="warning-content">
                        Currently no book issued.
                        
                    </div>
                </div>
                
                <div class="container-danger">
                    <div class="danger-content">
                        Currently no outstanding fines.
                    </div>
                </div>
            </div> -->

            <br><br><br>
            <div class="content">
                <!-- <div class="left trans3" style="padding:15px"> -->
                    <nav class="container" id="navbar" style="margin: 5px;">
                        <center>
                            <div class="grid-container--fit">
                                <div class="grid-element">    
                                    <a href='/student/home'><b>Home</b></a>               <br><br>
                                </div>
                                <div class="grid-element">    
                                    <a href="{{url('/student/browse')}}"><b>Browse</b></a>           <br><br>
                                </div>
                                <!-- <div class="grid-element">    
                                    <a href="{{url('/student/search')}}"><b>Search</b></a>           <br><br>
                                </div> -->
                                <!-- <div class="grid-element">    
                                    <a href=""><b>Availability</b></a>           <br><br>
                                </div> -->
                                <div class="grid-element">    
                                    <a href="{{url('/student/reserve')}}"><b>ReserveBook</b></a>           <br><br>
                                </div>
                                <!-- <div class="grid-element">    
                                    <a href=""><b>RequestBook</b></a>           <br><br>
                                </div> -->
                                <div class="grid-element">    
                                    <a href="{{url('/student/settings')}}"><b>Settings</b></a>           <br><br>
                                </div>
                                <!-- <div class="grid-element">    
                                    <a href=""><b>Logout</b></a>           <br><br>
                                </div>     -->
                            </div>
                        </center>
                    </nav>
                <!-- </div> -->
                <div class="blur2">
                    <div class="trans2" 
                    style="padding:10px;" >         <!-- Because trans2 already has margin-left added to it to prevent it
                                                          from blurring navbar -->
                        @yield('content')
                        @yield('searchResult')

                        
                        <!-- <div class="trans1">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, consectetur corporis! Nostrum optio sapiente eius ab, excepturi corporis nam laborum error soluta accusantium sunt necessitatibus nesciunt, sit officia aperiam dolorum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae repellendus deleniti accusantium laborum exercitationem molestias modi consequatur qui non ex sapiente consectetur unde adipisci eveniet asperiores nihil, quasi nisi dolorum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptates, maxime error rem, aspernatur repellat explicabo corporis consectetur harum est minus autem cum similique vel quod. Saepe labore aspernatur rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, vero culpa. Quod, recusandae molestiae labore aperiam non commodi placeat facere itaque quidem esse a adipisci maxime debitis dicta, sunt iusto? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quod architecto. Numquam expedita laboriosam quaerat! Dolores, quos doloremque itaque libero, ex corrupti architecto illum, nostrum placeat voluptate aliquid molestiae repudiandae.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, consectetur corporis! Nostrum optio sapiente eius ab, excepturi corporis nam laborum error soluta accusantium sunt necessitatibus nesciunt, sit officia aperiam dolorum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae repellendus deleniti accusantium laborum exercitationem molestias modi consequatur qui non ex sapiente consectetur unde adipisci eveniet asperiores nihil, quasi nisi dolorum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptates, maxime error rem, aspernatur repellat explicabo corporis consectetur harum est minus autem cum similique vel quod. Saepe labore aspernatur rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, vero culpa. Quod, recusandae molestiae labore aperiam non commodi placeat facere itaque quidem esse a adipisci maxime debitis dicta, sunt iusto? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quod architecto. Numquam expedita laboriosam quaerat! Dolores, quos doloremque itaque libero, ex corrupti architecto illum, nostrum placeat voluptate aliquid molestiae repudiandae.
                            </p>
                        </div> -->
                        
                    </div>
                </div>
        
            </div>
            
            <script>
                window.onscroll = function() {  stickyNavbar() };           /*function is created @line8 */
                var navbar = document.getElementById("navbar");             /*navbar's id is ready in script variable 'navbar'*/ 
                var sticky = navbar.offsetTop;                              /*gets the position of navbar and stores it into sticky*/
                var user = <?php echo json_encode($userName); ?>;
                function stickyNavbar() {
                    if (window.pageYOffset >= sticky) {
                        navbar.classList.add("sticky")
                    } else {
                        navbar.classList.remove("sticky")
                    }
                }
                function confirmReservation(obj) {
                    var id = obj.id;
                    console.log(user);
                    if(confirm("Confirmation Message: Reserve the book with Book ID : "+id)){
                        window.location='/student/'+user+'/reserve/book/'+id;
                    }
                }
                function noBack()
                {
                    window.history.forward();
                }
                window.onpaint = noBack();
            </script>
        <!-- </div> -->
    </body>
    
</html>