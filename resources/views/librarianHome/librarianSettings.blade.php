@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>
    Librarian | Settings
</title>
@endsection

@section('css')
<style>
    .blurs{
        position : fixed;
        left: 21%;
        margin: 0;
        padding: 0;
        /* margin-left: 22%; */
        width: 78%;
        height: 80%;
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
        font-size:1.75em;
        /* height:900px; */
        z-index: -1;
        right:0;
        overflow: auto;
    }
    .transs{
        position: fixed;
        background-color: #ffffff;
        opacity: 0.7;
        width: 78%;
        height: 80%;
        z-index: -1;
    }
    .container{
        position: relative;
        margin: 0;
        margin-top: 5.2%;
        margin-left: 21%;
        padding: 0;
        padding-left: 15px;
        width: 76.5%;
        height: 78.9%;
        font-weight: 0;
        /* border-style: solid; */
    }
    .button{
        width:100%;
        font-size: 2rem;
        font-weight: 900;
        padding: 10px;
    }
    .button:hover{
        background: black;
        color: white;
    }
    .rounded
    {
        font-size:16pt;
        border-radius:20px;
        box-shadow: 2px 2px 3px #666;
        padding-left: 10px;
    }
    .rounded:focus{
        font-size:16pt;
        border-radius:0px;
        background-color:lightblue;
        box-shadow: 2px 2px 3px #666;
        border-color: #339933;
    }
    .left{
        position: fixed;
        width: 33%;
        left: 25%;
        height: 600px;
        /* border-style: solid; */
        align: right
    }
    .right{
        position: fixed;
        width: 33%;
        /* border-style: solid; */
        right: 11%;
        align:right;
    }
    .submit-password{
        position: absolute;
        right: 15rem;
        background: slateblue;
        bottom: 18rem;
        height: 3rem;
        font-size: 1.6rem;
        font-weight: 500;
        border-radius: 15px;
        width: 8rem;
    }
    .submit-password:hover{
        background: white;
        border-color: slateblue;
        color: slateblue;
    }
    .submit-contact{
        position: absolute;
        left: 10rem;
        background: slateblue;
        bottom: 26rem;
        height: 3rem;
        font-size: 1.6rem;
        font-weight: 500;
        border-radius: 15px;
        width: 8rem;
    }
    .submit-contact:hover{
        background: white;
        border-color: slateblue;
        color: slateblue;
    }
</style>
@endsection
    <div class="blurs"><div class="transs"></div></div>
    <div class="container">
        <center>
            <h1 style="padding-top:5px;font-size:3rem">Settings :</h1>
            <table style="font-size: 2rem; width: 100%">
                <tr>
                    <th width="50%">
                        <button class="button" onclick="contactDetails()">Change Contact Details</button>
                    </th>
                    <th width="50%">
                        <button class="button" onclick="changePassword()">Change Password</button>

                    </th>
                </tr>
                <tr>
                    <td class="left">
                        <center>@yield('contactDetails')</center>
                    </td>
                    <td class="right">
                        <center>@yield('changePassword')</center>
                    </td>
                </tr>
            </table>
            <br>
        </center>
            <button class="button" style="width:98%;position:absolute; bottom:0;" onclick="logout()">Logout</button>
    </div>
@section('content')