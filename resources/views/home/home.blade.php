<!DOCTYPE html>
<html>
	<head>
		<title>Library Management System</title>
		<link rel="stylesheet" href="{{ asset('public/css/home.css') }}">
		<style type="text/css">

			body{
				background-image:url('https://cdn11.bigcommerce.com/s-ka7ofex/images/stencil/2000x1000/uploaded_images/how-rfid-is-making-libraries-smarter.jpg?t=1580145106');
			}

			div *.overflow:auto;

			h{
				color:black;
			}


			h1{
				margin: 5%;					/*to show data in transparent box*/ 
				font-weight: bold;			/*concept(we must increase the z layer)*/ 
				color: black;				/*Color of the fonts*/
				
				margin-top:1%;
				margin-bottom:5px;
				border-style:solid;
				border-top:0;
				border-left:0;
				border-right:0;
				font-size:3em;
				text-shadow:2px 2px grey;
			}
			.transparent{
				margin: 0;
				background-color: #ffffff;
				border: 1px solid black;
				width:100%;
				/* border-radius:20px; */
				opacity: 0.7;
			}
			.transMenu{
				position:relative;
				margin-top: 9em;
				backdrop-filter:blur(10px);
				background-color: #ffffff;
				border: 1px solid black;
				width:500px;
				height:250px;
				border-radius:20px;
				opacity: 0.7;				
			}
			.transSignup{
				position:relative;
				margin-top: 9em;
				backdrop-filter:blur(4px);
				background-color: #ffffff;
				border: 1px solid black;
				width:500px;
				height:700px;
				border-radius:20px;
				opacity: 0.7;				
			}
			.container{
				position:relative;
				left:0;
				min-width: 20%;
				max-width: 60%;
				height: 200px;          /*If height isnt given data overflows and a scrollbar is provided to navigate */
				max-height:600px;
			}
			.container1{
				position:relative;
				left:0;
				min-width: 20%;
				max-width: 20%;
				height: 100px;          /*If height isnt given data overflows and a scrollbar is provided to navigate */
				font-size:25px;
				color:white;
			}
			.container2{
				position:relative;
				left:0;
				min-width: 20%;
				max-width: 20%;
				height: 100px;          /*If height isnt given data overflows and a scrollbar is provided to navigate */
				font-size:25px;
				color:white;
			}
			.container3{
				position:relative;
				left:0;
				width:50%;
				min-width: 20%;
				max-width: 100%;          
				max-height:600px;		/*If height isnt given data overflows and a scrollbar is provided to navigate */
			}
			.container2 p{
				color:white;
				background-color:black;
				backdrop-filter:blur(4px);
				opacity:80%;
			}
			.container2 p a{
				color:white;
				text-decoration:none;
				
				opacity:100%;
			}
			.container2 p a:hover{
				text-decoration:underline;
			}
			a b{
				color:black;
				backdrop-filter:blur(10px);
				text-decoration:none;
			}
			a b:hover{
				text-decoration:underline;
			}
			.absolute1{
				position: absolute;;
				top:5%;
				left:30%;
				max-width: 250px;
			}
			.absolute2{
				position: absolute;
				top:42.5%;
				left:26%;
				max-width:250px;
			}
			.absolute3{
				position: absolute;;
				top:80%;
				left:30%;
				max-width: 250px;
			}
			marquee{
				font-size:25px;
			}
			.rounded
			{
				font-size:16pt;
				border-radius:20px;
				box-shadow: 2px 2px 3px #666;
				padding-left: 10px;
			}
			.submitRounded{
				background-color:#4CAF50;
				margin-top:15px;
				font-size:16pt;
				width:150px;
				border-radius:25px;
				box-shadow: 2px 2px 3px #666;
				height:35px;
			}
			.rounded:focus{
				font-size:16pt;
				border-radius:0px;
				background-color:lightblue;
				box-shadow: 2px 2px 3px #666;
				border-color: #339933;
			}
		</style>
	</head>
	
	<body oninit="noBack()">

		@yield('content');
		
	</body>
	<script>
		function studLogin(){
			window.location="{{url('/student/home')}}";
		}
		function libLogin(){
			window.location="{{url('/librarian/home')}}";
		}
		function studRegis(){
			window.location="{{url('/')}}"
		}
		function noBack()
		{
			window.history.forward();
		}
		window.onpaint = noBack();
	</script>
</html>