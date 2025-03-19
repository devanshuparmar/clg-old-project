<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <style>
        body{
            margin:0;
            background-image:url('https://cdn11.bigcommerce.com/s-ka7ofex/images/stencil/2000x1000/uploaded_images/how-rfid-is-making-libraries-smarter.jpg?t=1580145106');
        }
        a{
            text-decoration:none;
        }
        header{
            position: fixed;
            width: 90%;
            height: 4rem;
            top: 0;
            margin: 0;
            padding-left: 10%;
            background: black;
            color: white;
        }
        header:hover{
            background: white;
            color: black;
        }
        header h1{
            margin: 0;
            margin-top: 0.8125rem;
            font-size: 2rem;
        }
        .leftNavbar{
            position: fixed;
            top: 12%;
            width: 20%;
            height: 40rem;
            background: grey;
            font-size: 1.5rem;
        }
        .rightSection{
            position: relative;
            margin-left: 21%;
            margin-top: 5rem;
            /* background: white; */
            /* border-style: solid; */
            max-width: 78%;
        }
        .grid-container--fit {
            grid-template-columns: repeat(auto-fit, minmax(3rem, 1fr));
            overflow:auto;
        }
        .grid-container--fit a{
            text-decoration: none;
            color: white
        }
        .grid-container--fit a:visited{
            text-decoration: none;
        }
        .grid-element:nth-child(1){
            background-color: coral;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element:nth-child(2){
            background-color: cornflowerblue;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element:nth-child(3){
            background-color: mediumseagreen;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element:nth-child(4){
            background-color: mediumseagreen;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element:nth-child(5){
            background-color: mediumseagreen;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        /* .grid-element:nth-child(6){
            background-color: goldenrod;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem; */
        }
        .grid-element:nth-child(6){
            background-color: slateblue;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element:nth-child(7){
            background-color: maroon;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element {
            background-color: grey;
            padding: 0px;
            padding-top:10px;
            color: white;
            border: 1px solid #fff;
            height: 5rem;
        }
        .grid-element a:hover{
            background-color: #f2f2f2;
            color: black;
        }
    </style>
    @yield('css')
</head>
<body>
    <a href="{{url('/librarian/home')}}">
        <header>
            <h1><--- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Back to Menu</h1>
        </header>
    </a>
    <nav class="leftNavbar">
        <div class="grid-container--fit">
            <div class="grid-element">
                <a href="{{url('/librarian/issue/books')}}">        
                    <center style="padding-top: 23px">
                        Issue
                    </center>
                </a>
            </div>
            <div class="grid-element">
                <a href="{{url('/librarian/collect')}}">        
                    <center style="padding-top: 23px">
                        Collect
                    </center>
                </a>
            </div>
            <div class="grid-element">
                <a href="{{url('/librarian/manageBook/')}}">        
                    <center style="padding-top: 23px">
                        Manage Books
                    </center>
                </a>
            </div>
            <div class="grid-element">
                <a href="{{url('/librarian/manage-authors')}}">        
                    <center style="padding-top: 23px">
                        Manage Authors
                    </center>
                </a>
            </div>
            <div class="grid-element">
                <a href="{{url('/librarian/manage-publishers')}}">        
                    <center style="padding-top: 23px">
                        Manage Publishers
                    </center>
                </a>
            </div>
            <!-- <div class="grid-element">
                <a href="">        
                    <center style="padding-top: 23px">
                        Reports
                    </center>
                </a>
            </div> -->
            <div class="grid-element">
                <a href="{{url('/librarian/settings')}}">        
                    <center style="padding-top: 23px">
                        Settings
                    </center>
                </a>
            </div>
            <div class="grid-element">
                <a href="{{url('/librarian/logout')}}">        
                    <center style="padding-top: 23px">
                        Logout
                    </center>
                </a>
            </div>
        </div>
    </nav>
    <div class="rightSection">
        <div class="blur">
            <div class="trans">
                @yield('content')
            </div>
        </div>
    </div>
    <script>

        function searchByBookId(){
            window.location="{{url('/librarian/manageBooks/results/bookId')}}"
        }
        
        function searchByBookName(){
            window.location="{{url('/librarian/manageBooks/results/bookName')}}"
        }

        function searchByBookAuthor(){
            window.location="{{url('/librarian/manageBooks/results/bookAuthor')}}"
        }

        function contactDetails(){
            window.location="{{url('/librarian/settings/contact-details')}}"
        }

        function changePassword(){
            window.location="{{url('/librarian/settings/change-password')}}"
        }

        function logout(){
            window.location="{{url('/librarian/logout')}}"
        }

        function selectBook(obj) {
            var bookId = obj.id;
            if(confirm("Confirmation Message: You are going to issue a book with Book ID : "+bookId+". Continue?")==1){
                window.location = '/librarian/issue/issueBook/toStudent/'+bookId;
            }
        }
        function confirmIssue(obj) {
            var id = obj.id;
            if(confirm("Confirmation Message: Reserve the book with Book ID : "+id)==1){
                alert("Collect the reserved book within 5 hours starting from the time of reservation or the reservation will be reversed.");
            }
        }
        function collectBooks(obj) {
            var bookId = obj.id;
            if(confirm("Confirmation Message: You are going to collect a book with Book ID : "+bookId+". Continue?")==1){
                window.location = '/librarian/collect-book/'+bookId;
            }
            else{
                alert("The book was not collected.")
            }
        }

        function one(obj) {
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to issue a book with Book ID : "+bookId+". Continue?")){
                alert("You issued the book successfully.");
                window.location = "{{ url('/librarian/home')}}";
            }
            else{
                alert("The book was not issued.")
            }
        }

        function addNewBooks(){
            if(confirm("Confirmation Message: You are going to add New Book. Continue?")){
                window.location="{{url('/librarian/manageBooks/addNewBook')}}";
            }
            else{
                alert("The book was not issued.")
            }
        }
        
        function editBooks(obj){
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to edit the details of a book with Book ID : "+bookId+". Continue?")){
                window.location='/librarian/manageBooks/editDetails/'+bookId;
            }
            else{
                alert("The book's details were not edited.")
            }
        }

        function removeBooks(obj){
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to remove a book with Book ID : "+bookId+". Continue?")){
                window.location='/librarian/remove/book/'+bookId;
            }
            else{
                alert("The book was not removed.")
            }
        }

        function addAuthor(){
            if(confirm("Confirmation Message: You are going to add Author. Continue?")){
                window.location="{{url('/librarian/add-new-author')}}";
            }
            else{
                alert("The book was not issued.")
            }
        }

        function editAuthors(obj){
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to edit the details of an author with the ID : "+bookId+". Continue?")){
                window.location='/librarian/authors/edit/'+bookId;
            }
            else{
                alert("The book's details were not edited.")
            }
        }

        function removeAuthors(obj){
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to remove an author with the ID : "+bookId+". Continue?")){
                window.location='/librarian/authors/remove/'+bookId;
            }
            else{
                alert("The book was not removed.")
            }
        }

        function addNewPublishers(){
            if(confirm("Confirmation Message: You are going to add publisher. Continue?")){
                window.location="{{url('/librarian/add-new-publisher')}}";
            }
            else{
                alert("The book was not issued.")
            }
        }

        function editPublishers(obj){
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to edit the details of an publisher with the ID : "+bookId+". Continue?")){
                window.location='/librarian/publisher/edit/'+bookId;
            }
            else{
                alert("The book's details were not edited.")
            }
        }

        function removePublishers(obj){
            var bookId = obj;
            if(confirm("Confirmation Message: You are going to remove an author with the ID : "+bookId+". Continue?")){
                window.location='/librarian/publishers/remove/'+bookId;
            }
            else{
                alert("The book was not removed.")
            }
        }

    </script>
</body>
</html>