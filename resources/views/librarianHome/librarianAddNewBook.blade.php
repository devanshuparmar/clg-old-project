@extends('librarianHome.librarianMenuConnector')

@section('title')
<title>
    Librarian | Manage Books | Add New Book
</title>
@endsection


@section('css')
<style>
    .blurs{
        margin: 0;
        padding: 0;
        /* margin-left: 22%; */
        width: 100%;
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
        font-size:1.75em;
        /* height:900px; */
        right:0;  
    }
    .transs{
        position: relative;
        background-color: #ffffff;
        opacity: 0.8;
        height: 100%;
    }
    .container{
        position: relative;
        margin: 0;
        margin-top: 5.2%;
        margin-left: 21%;
        padding: 0;
        width: 76.5%;
        height: 78.9%;
        /* border-style: solid; */
    }
    .rounded{
        font-size:25px;
        border-radius:15px;
        width: 20.3125rem;
        padding-left:10px;
    }
    .rounded:focus{
        border-radius: 0;
    }
    .button{
        width: 10.5rem;
        font-size: 1.25rem;
        height: 2.5rem;
        border-color: black;
        background: #1cac78;
        /* color: white; */
        border-radius: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
@section('content')
<!-- <center> -->
    <div class="container">
        <div class="blurs">
            <div class="transs">
                <center>
                    <form action="/adding-new-book" method="POST">
                    @csrf
                        <table style="font-size: 1.8rem" cellspacing="20px">
                            <label for="table" style="font-weight: 550;font-size: 2.5rem;">
                                Add New Book
                            </label>
                            <br>
                            <tr><br></tr>
                            <tr>
                                <td>
                                    Book Name :
                                </td>
                                <td>
                                    <input class="rounded" type="text" name="bookName" placeholder="Enter book's name here" autofocus required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Book Author :
                                </td>
                                <td>
                                    <select class="rounded" name="bookAuthor">
                                        @foreach($authors as $author)
                                            <option value="<?php echo $author -> author_name ?>"><?php echo $author -> author_name ?></option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Book Publisher :
                                </td>
                                <td>
                                    <select class="rounded" id="bookPublisher" name="bookPublisher">
                                         
                                        @foreach($publishers as $publisher)
                                            <option value="<?php echo $publisher -> publisher_name ?>" style="padding-left: 10px"><?php echo $publisher -> publisher_name ?></option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Number of Books :
                                </td>
                                <td>
                                    <input class="rounded" type="number" min="1" name="bookNumber" placeholder="Enter the number of books" required>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="button" value="Add New Book">
                    </form>
                </center>
            </div>
        </div>
    </div>
<!-- </center> -->