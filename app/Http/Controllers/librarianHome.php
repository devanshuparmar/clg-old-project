<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\author;
use App\Models\student;
use App\Models\issueBook;
use App\Models\book;
use App\Models\publisher;

class librarianHome extends Controller
{

    public function view(){
        if(session('uname')==null){
            return redirect('/loginL');
        }
        $data=student::where('approval','=',0)->simplePaginate(100);
        $number=$data->count();
        // dd($data,gettype($number),$data[0]);
        return view('librarianHome/librarianHome')->with('data',$data)->with('number',$number);
    }

    public function approve(){
        $students=student::where('approval','=',0)->simplePaginate(50);
        // dd($students);
        $count=$students->count();
        if($count!=0){
            return view('librarianHome/approveStudents')->with('data',$students);
        }
        return redirect('/librarian/home');
    }

    public function approved($id){
        $yes=(int)1;
        // dd(gettype($yes));
        $saved = student::where('idstudents','=',$id)->update([
            'approval' => $yes
        ]);
        // dd($id,$saved);
        $to = student::where('idstudents','=',$id)->pluck('email');
        // dd($to,$array);
        $subject = 'Welcome to LMS';
        $message = 'Congratulations & Welcome to Library management System. Your profile have been verified by one of our librarians. You can now reserve a book but you have to check that book out withon 3 hours of reservation. You have to return the book or reissue the book within 7 days to or you will be fined Rs. 10/day untill the book is not returned.';
        $headers = 'From: devanshuparmar3382@gmail.com'       . "\r\n" .
                 'Reply-To: devanshuparmar3382@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        \Mail::to($to)->queue(new \App\Mail\welcome($details));
        return redirect('/approve-students');
    }

    public function reject($id){
        $yes=(int)2;
        // dd(gettype($yes));
        $saved = student::where('idstudents','=',$id)->update([
            'approval' => $yes
        ]);
        // dd($id,$saved);
        $to = student::where('idstudents','=',$id)->pluck('email');
        // dd($to,$array);
        $subject = 'Welcome to LMS';
        $message = 'Congratulations & Welcome to Library management System. Your profile have been verified by one of our librarians. You can now reserve a book but you have to check that book out withon 3 hours of reservation. You have to return the book or reissue the book within 7 days to or you will be fined Rs. 10/day untill the book is not returned.';
        $headers = 'From: devanshuparmar3382@gmail.com'       . "\r\n" .
                 'Reply-To: devanshuparmar3382@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        \Mail::to($to)->queue(new \App\Mail\welcome($details));
        return redirect('/approve-students');
    }

    public function connect(){
        return view('librarianHome/librarianMenuConnector');
    }

    public function issue(){
        return view('librarianHome/librarianIssueLanding');
    }

    public function issueSearchResultID(Request $req){
        $bid = $req->get('search');
        $books = book::find($bid);
        // dd(gettype($books),$bid,$books);
        if($books==null){
            return redirect('/librarian/home')->with('success',"We do not have this book." );
        }
        return view('librarianHome/librarianIssueSearchResultsId')->with('books',$books);
    }

    public function libIssueToStud($id){
        // dd($id);
        return view('librarianHome/librarianIssueToStud')->with('bookId',$id);
    }

    public function issueFinal(Request $req){
        $bookId = $req->get('bookId');
        $bookId = (int)$bookId;
        $studId = $req->get('studentId');
        $studId = (int)$studId;
        $books = book::where('id_books','=',$bookId)->simplePaginate(10);
        // $books = $books[0];
        // dd($bookId,$studId,gettype($bookId),$books);
        $studDets = student::find($studId);
        $books = $books[0];
        $numBooks = $books->number_of_books;
        $updatedNumberOfBooks = $numBooks-1;
        $todayDate = now();
        $todayDate = $todayDate->toDateTimeString();
        $issueTime = \Carbon\Carbon::parse($todayDate);
        $dueDate = \Carbon\Carbon::now()->addDays(7);
        $dueDate = $dueDate->toDateTimeString();
        $diff = ($issueTime->diffInDays($todayDate));
        $find = issueBook::where('student_id',$studId)->simplePaginate(10);
        $s = 0;
        // dd($find);
        foreach($find as $x){
            if($x->return_date==null){
                $s=1;
            }  
        }
        if($s==1){
            return redirect('/librarian/home')->with('success','Student already has 1 copy of this book.');
        }
        // dd($diff);
        $fine = (int)0;
        $daysInPossession = (int)$diff;
        $libId = session('uname');
        // dd($libId,$books->name,$books->author,$dueDate,$diff,$daysInPossession,$todayDate,$issueTime,$bookId,gettype($fine),$studId,$books,$numBooks,$updatedNumberOfBooks);
        if($studDets==null){
            return redirect('/librarian/home')->with('success','You have entered incorrect student id, Please try again.');
        }
        else{
            // dd($updatedNumberOfBooks,$studId,$bookId,$todayDate,$dueDate,$daysInPossession,$fine);
            $updateBooksTable = book::where('id_books','=',$bookId)->update([
                'number_of_books' => $updatedNumberOfBooks
            ]);
            if($updateBooksTable==1)
            {
                $issueBook = new issueBook([
                    'student_id' => $studId,
                    'book_id' => $bookId,
                    'book_name' => $books->name,
                    'book_author' => $books->author,
                    'librarian_id' => $libId,
                    'issue_date' => $todayDate,
                    'due_date' => $dueDate,
                    'days_in_possession' => $daysInPossession,
                    'fined' => $fine
                ]);
                $issueBook->save();
                return redirect('/librarian/home')->with('success','Book Issued Successfully.');
            }
            else
            {
                $updateBooksTable = book::where('book_id',$bookId)->update(['number_of_books',$numBooks]);
            }
        }
    }

    public function issueSearchResultBookName(Request $req){
        $name = $req -> get('search');
        // dd($name);
        $books = book::where('name','LIKE',"%{$name}%")->simplePaginate(3);
        // dd(gettype($books),$name,$books);
        return view('librarianHome/librarianIssueSearchResultsBookName')->with('books',$books);
    }

    public function issueSearchResultBookAuthor(Request $req){
        $name = $req -> get('search');
        $books = book::where('author','LIKE',"%{$name}%")->simplePaginate(3);
        // dd(gettype($books),$name,$books);
        return view('librarianHome/librarianIssueSearchResultsBookAuthor')->with('books',$books);
    }
    
    public function searchPublishers(Request $req){
        $name = $req -> get('searchbar');
        $publisher = publisher::where('publisher_name','LIKE',"%{$name}%")->simplePaginate(3);
        // dd($name,gettype($name),$publisher);
        return view('librarianHome/librarianManagePublishersView')->with('data',$publisher);
    }

    public function searchAuthors(Request $req){
        $name = $req -> get('searchbar');
        $author = author::where('author_name','LIKE',"%{$name}%")->simplePaginate(3);
        // dd($name,gettype($name),$publisher);
        return view('librarianHome/librarianManageAuthorsView')->with('data',$author);
    }

    public function libCollectFromStud(){
        return view('librarianHome/librarianCollectLanding');
    }

    public function libCollectStud(Request $req){
        $studId = $req->get('search');
        // dd($studId);
        $todayDate = now();
        // $todayDate = $todayDate->toDateTimeString();
        
        // dd($todayDate);
        $issue=issueBook::where('student_id','=',$studId)->where('return_date','=',null)->simplePaginate(3);
        // dd($issue);
        foreach($issue as $x){
            $dayDiff = ($todayDate->diffInDays($x->issue_date));
            // dd($dayDiff);
            $bookId = issueBook::where('student_id','=',$x->student_id)->where('return_date','=',null)->pluck('book_id');
            
            $bookId = $bookId[0];
            
            // dd($bookId,$bookNum);
            if($dayDiff>7){
                $fine = ($dayDiff-7)*10;
                // dd($fine);
                $update = issueBook::where('student_id','=',$x->student_id)
                    ->where('return_date','=',null)
                    ->update('fine'->$fine,
                        'days_in_possession'->$dayDiff
                    );
            }
        }
        // dd($studId);
        $issue=issueBook::where('student_id','=',$studId)->where('return_date','=',null)->simplePaginate(3);
        // dd($issue);
        return view('librarianHome/librarianCollectViewStudentsBooks',['data' => $issue]);
    }

    public function collectFinal($id){
        $issuedBook = issueBook::find($id);
        $todayDate = now();
        $todayDate = $todayDate->toDateTimeString();
        $issueDate = $issuedBook->issue_date;
        // dd($issueDate);
        $issueDate = \Carbon\Carbon::parse($issueDate);
        $today = \Carbon\Carbon::parse($todayDate);
        $diff = ($issueDate->diffInDays($today));
        $todayDate = $today->toDateTimeString();
        $id = (int)$id;
        // dd(gettype($id),$id);
        // dd($diff,gettype($today),$today,gettype($issueDate),$issueDate,$issuedBook->student_id,$id);
        $bookId = issueBook::where('issue_id','=',$id)->where('return_date','=',null)->pluck('book_id');
        // dd($today,$todayDate);
        // $bookId = $bookId[0];
        // dd($bookId);
        $bookNum = book::where('id_books','=',$bookId)->pluck('number_of_books');
        $bookNum = $bookNum[0];
        $bookNum += 1; 
        // dd($id,$bookId,$bookNum);
        $update=issueBook::find($id)->update(['return_date'=>$todayDate]);
        $update = book::where('id_books','=',$bookId)->update(['number_of_books'=>$bookNum]);
        return redirect('/librarian/home')->with('success','You have collected the book successfully.');
    }

    public function manageBooks(){
        return view('librarianHome/librarianManageBooksLanding');
    }

    public function manageBook(){
        $books = book::all();        
        return view('librarianHome/librarianManageBooks',['books' => $books]);
    }

    public function editDetails(){
        return view('librarianHome/librarianManageBooksEditDetails');
    }

    public function removeBook(){
        return view('librarianHome/librarianManageBooksRemoveBook');
    }

    public function bookIdResult(){
        $bid = (int)request()->query('searchbar');
        $books = book::find($bid);
        if($books==null){
            return redirect('/librarian/manageBooks')->with('success','Could not find the book.');
        }
        // dd(gettype($books),$bid,$books);
        return view('librarianHome/librarianManageBookResultID')->with('books',$books);
    }

    public function bookNameResult(){
        $name = request()->query('searchbar');
        $books = book::where('name','LIKE',"%{$name}%")->simplePaginate(3);
        // dd(gettype($books),$name,$books);
        return view('librarianHome/librarianManageBookResultName')->with('books',$books);
    }
    
    public function bookAuthorResult(){
        $name = request()->query('searchbar');
        $books = book::where('author','LIKE',"%{$name}%")->simplePaginate(3);
        // dd(gettype($books),$name,$books);
        return view('librarianHome/librarianManageBookResultAuthor')->with('books',$books);
    }

    public function manageAuthor(){
        return view('librarianHome/librarianManageAuthors');
    }

    public function manageAuthorView(){
        return view('librarianHome/librarianManageAuthorsView');
    }

    public function settings(){
        return view('librarianHome/librarianSettings');
    }

    public function contactDetails(){
        return view('librarianHome/librarianSettingsContactDetails');
    }

    public function changePassword(){
        return view('librarianHome/librarianSettingsChangePassword');
    }

    public function logout(){
        session()->put('uname',null);
        return redirect()->route('home.loginL');
    }

    public function addNewBook(Request $req){
        $this->validate($req,[
            'bookName' => 'required',
            'bookAuthor' => 'required',
            'bookPublisher' => 'required',
            'bookNumber' => 'required'
        ]);
    
        $book = new book([
            'name' => $req -> get('bookName'),
            'author' => $req -> get('bookAuthor'),
            'publisher' => $req -> get('bookPublisher'),
            'number_of_books' => $req -> get('bookNumber'),
            'total_books' => $req -> get('bookNumber'),
        ]);
    
        $book->save();
        return redirect('/librarian/manageBook')->with('success','You have added a new book successfully.');
    }

    public function editBookDetails($id){
        // echo $id;
        $data = book::find($id);
        $author = author::all();
        $publisher = publisher::all();
        
        return view('librarianHome/librarianManageBooksEditDetails',['data' => $data,'author' => $author,'publisher' => $publisher]);
    }

    public function updateBooks(Request $request){
        $saved = book::where('id_books','=',$request->bookID)->update(['name' => $request->bookName,
        'author' => $request->bookAuthor,
        'publisher' => $request->bookPublisher,
        'number_of_books' => $request->numberOfBooks]);
        
        if($saved){
            return redirect('/librarian/manageBook')->with('success','Book Data Updated Successfully.');
        }
    }

    public function deleteBooks($id){
        $data = book::find($id)->delete();
        // dd($id);
        if($data){
            return redirect('/librarian/manageBook')->with('success','Book Removed Successfully.');
        }
    }

    public function newAuthors(){
        return view('/librarianHome/librarianAddAuthor');
    }

    public function addNewAuthors(Request $req){
        $this->validate($req,[
            'authorName' => 'required'
        ]);

        $author = new author([
            'author_name' => $req -> get('authorName')
        ]);

        $author -> save();
        return redirect('/librarian/manage-authors')->with('You have successfully added a new author.');
    }

    public function getAuthors(){
        $authors = author::all();
        $publishers = publisher::all();
        //author is model
        return view('/librarianHome/librarianAddNewBook',['authors' => $authors,'publishers' => $publishers]);
    }

    public function showAuthors(){
        $data = author::all();
        // student is model
        return view('/librarianHome/librarianManageAuthorsView',['data' => $data]);
    }

    public function editAuthors($id){
        echo $id;
        $data = author::find($id);
        return view('librarianHome/librarianManageAuthorsEdit',['data' => $data]);
    }

    public function updateAuthors(Request $request){
        $saved = author::where('author_id','=',$request->authorId)->update(['author_name' => $request->authorName]);
        
        if($saved){
            return redirect('/librarian/manage-authors')->with('success','Author Data Updated Successfully.');
        }
    }

    public function removeAuthors($id){
        $data = author::find($id)->delete();
        if($data){
            return redirect('/librarian/manage-authors')->with('success','Author Removed Successfully.');
        }
    }

    public function newPublisher(){
        return view('librarianHome/librarianAddPublisher');
    }

    public function addNewPublisher(Request $req){
        $this->validate($req,[
            'publisherName' => 'required'
        ]);

        $publisher = new publisher([
            'publisher_name' => $req -> get('publisherName')
        ]);

        $publisher -> save();
        return redirect('/librarian/manage-publishers')->with('You have successfully added a new author.');
    }

    public function editPublishers($id){
        echo $id;
        $data = publisher::find($id);
        return view('librarianHome/librarianManagePublishersEdit',['data' => $data]);
    }

    public function updatePublishers(Request $request){
        $saved = publisher::where('publisher_id','=',$request->publisherId)->update(['publisher_name' => $request->publisherName]);
        
        if($saved){
            return redirect('/librarian/manage-publishers')->with('success','Publisher Data Updated Successfully.');
        }
    }

    public function managePublishers(){
        $data = publisher::all();
        //publisher is model
        return view('librarianHome/librarianManagePublishersView',['data' => $data]);
    }

    public function removePublishers($id){
        $data = publisher::find($id)->delete();
        if($data){
            return redirect('/librarian/manage-publishers')->with('success','Author Removed Successfully.');
        }
    }

    public function reportView(){
        return view('librarianHome.reportView');
    }
    public function transactions(){
        $id = session('uname');
        // dd($id);
        $transactions = issueBook::where('librarian_id','LIKE',$id)->where('return_date','NOT LIKE',null)->simplePaginate(100);
        // dd($transactions);
        return view('librarianHome.transactions')->with('data',$transactions);
    }
    public function current(){
        $id = session('uname');
        $transactions = issueBook::where('librarian_id','LIKE',$id)->where('return_date','LIKE',null)->simplePaginate(100);
        // dd($id,$transactions);
        return view('librarianHome.currentIssue')->with('data',$transactions);
    }
}
