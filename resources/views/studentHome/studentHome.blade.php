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
    display: inline-block;
    width: 27%;
    height: 40%;
    border-style:solid;
    background-color:turquoise;
    border-size:20px;
    padding:10px;
    <!-- margin: 10px; -->
    font-weight:600;
    border-radius:20px;
}
.box1 {
    display: inline-block;
    width: 27%;
    height: 40%;
    border-style:solid;
    background-color:#FEE715FF;
    border-size:20px;
    padding:10px;
    <!-- margin: 10px; -->
    font-weight:600;
    border-radius:20px;
}

.box2 {
    display: inline-block;
    width: 27%;
    height: 40%;
    border-style:solid;
    background-color:#3f681c;
    border-size:20px;
    padding:10px;
    <!-- margin: 10px; -->
    font-weight:600;
    border-radius:20px;
}

@endsection

@section('title')
<title>Student Corner | Home</title>


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


    @if(session('totalBook')==0)
        <div class="box">
            <center>
                <h2>
                    Total
                </h2>        
                    <p style="font-size:40px">
                        {{session('totalBook')}}
                    </p>
                    
                        <!-- {$numIssuedTotal;} -->
                    
                <h3>
                    Books<br>Issued    
                </h3>
            </center>
        </div>
    @endif
    @if(session('totalBook')!=0)
    <a href="{{url('/student/totalBooksIssued')}}">
        <div class="box">
            <center>
                <h2>
                    Total
                </h2>        
                    <p style="font-size:40px">
                        {{session('totalBook')}}
                    </p>
                    
                        <!-- {$numIssuedTotal;} -->
                    
                <h3>
                    Books<br>Issued    
                </h3>
            </center>
        </div>
    </a>
    @endif

    <a href="{{url('/student/currentBooksIssued')}}">
        <div class="box1">
            <center>
                <h2>
                    Currently
                </h2>        
                    <p style="font-size:40px">
                        {{session('issuedBooks')}}
                        
                            <!-- {$numCurrent;} -->
                        
                    </p>
                <h3>
                    Books<br>Issued
                </h3>
            </center>
        </div>
    </a>

    @if(session('reservedBooks')==0)
    <!-- <a href="{{url('/student/booksReserved')}}"> -->
        <div class="box2" style="margin:20px">
            <center> 
                <h2>
                    Currently
                </h2>        
                <p style="font-size:40px">
                        {{session('reservedBooks')}}
                            
                    </p>
                <h3>
                    Books<br>Reserved
                </h3>
                <!-- <p style="color:#3f681c">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis unde quo, deleniti veniam assumenda cupiditate, error ut obcaecati placeat rerum provident amet?
                </p> -->
            </center>
        </div>
    <!-- </a> -->
    @endif
    @if(session('reservedBooks')!=0)
    <a href="{{url('/student/booksReserved')}}">
        <div class="box2">
            <center> 
                <h2>
                    Currently
                </h2>        
                <p style="font-size:40px">
                        {{session('reservedBooks')}}
                            
                    </p>
                <h3>
                    Books<br>Reserved
                </h3>
                <!-- <p style="color:#3f681c">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis unde quo, deleniti veniam assumenda cupiditate, error ut obcaecati placeat rerum provident amet?
                </p> -->
            </center>
        </div>
    </a>
    @endif
    
    
</center>
<script>
    console.log({{session('uname')}});
</script>

@if($message=Session::get('success'))
    <script>
        alert('{{$message}}')
    </script>
@endif

@endsection