@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>
    Librarian | Manage Books | Edit Book Details
</title>
@endsection
@section('css')
<style>
    .searchbar-manageBooks{
        z-index: 1;
        position: fixed;
        margin: 1rem 0 0 1rem;
        padding: 0 0 0 2rem;
        font-size: 25px;
        width: 30rem;
        height: 3rem;
        border-radius: 15px;
        /* padding:10px; */
    }
    .btn-book{
        position: fixed;
        z-index: 1;
    }
    .searchbar-manageBooks:focus{
        font-size: 25px;
        border-radius: 15px;
        background-color: lightblue;
    }
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
        width: 76.5%;
        height: 78.9%;
        font-weight: 0;
        /* border-style: solid; */
    }
    .button{
        /* float: right; */
        z-index: 1;
        position: relative;
        right: 25px;
        margin: 10px 0 0 0;
        background: mediumseagreen;
        font-size: 2rem;
        color: white;   
        height: 3rem;
        width: 15%;
        padding-bottom: 10px;
        border-radius: 25px;
    }
    .button:hover{
        background: white;
        color: mediumseagreen;
        border-style: solid;
        border-width: 5px;
        border-color: mediumseagreen;
        padding-bottom:45px;
    }
    td h3, th h3{
        font-size: 2rem;
        padding: 0;
        margin: 0;
    }
    .round-input{
        border-radius: 10px;
        padding-left: 15px;
        height: 40px;
        width: 22.744140625rem;
        font-size: 1.8rem;
    }
</style>

@section('content')

<?php 
    $bookPublisher=['Devanshu Parmar','R.D. Sharma','J.K. Rowlings','Frederick Forsyth'];
    $bookAuthor=['R.D. Sharma','J.K. Rowlings','Frederick Forsyth'];
?>

<div class="blurs"><div class="transs"></div></div>

<center style="padding:1rem;">
    <h1 style="font-size: 4rem;padding:0;">
        EDIT BOOK DETAILS
    </h1>
    <table cellspacing="10px" cellpadding="10px">
        <form action="/librarian/update/books" method="post">
        @csrf
            <tr>
                <th>
                    <h3 align="left">
                        Book ID : 
                    </h3>
                </th>
                <th>
                    <input class="round-input" style="text-align:right;padding-right:15px" type="text" name="bookID" value="{{$data->id_books}}" readonly>
                </th>
            </tr>
            <tr>
                <td>
                    <h3>
                        Book's Name :
                    </h3>
                </td>
                <td>
                    <input class="round-input" type="text" name="bookName" value="{{$data->name}}" placeholder="Enter Corrected Name">
                </td>
                
            </tr>
            <tr>
                <td>
                    <h3>
                        Book's Author :
                    </h3>
                </td>
                <td>
                <select class="round-input" name="bookAuthor">
                @if($data ?? '')
                    <option value="{{$data->author}}" style="padding-left: 10px"><?php echo $data->author ?></option>
                @endif
                @foreach($author as $a)    
                    <option value="{{$a->author_name}}" style="padding-left: 10px"><?php echo $a->author_name ?></option>
                @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        Book's Publisher :
                    </h3>
                </td>
                <td>
                <select class="round-input" name="bookPublisher">
                    @if($data)
                        <option value="{{$data->publisher}}" style="padding-left: 10px"><?php echo $data->publisher ?></option>
                    @endif
                    @foreach($publisher as $p)    
                        <option value="{{$p->publisher_name}}" style="padding-left: 10px"><?php echo $p->publisher_name ?></option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        Number of Books :
                    </h3>
                </td>
                <td>
                    <input class="round-input" type="number" min=1 value="{{$data->number_of_books}}" name="numberOfBooks" placeholder="Enter number of books">
                </td>
            </tr>
    </table>
            <input style="margin-top: 2rem" type="submit" class="button">
        </form>
</center>

@endsection