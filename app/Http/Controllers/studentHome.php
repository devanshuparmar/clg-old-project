<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\reservation;
use App\Models\student;
use App\Models\author;
use App\Models\book;
use App\Models\issueBook;
use App\Mail\forgotpasswd;
use App\Models\publisher;
use Illuminate\Support\Facades\DB;

class studentHome extends Controller
{

    public function view(Request $request){
        if(session('uid')==null and session('uname')==null){
            return redirect('/');
        }
        return view('studentHome/studentHome');
    }

    public function totalBooks(){
        $uid = session('uid');
        $uname = session('uname');
        $issuedTotal = issueBook::where('student_id','=',$uid)->where('return_date','NOT LIKE')->simplePaginate(10);
        // dd($uid,$uname,$issuedTotal);
        $no=$issuedTotal->count();
        // dd($no);
        if($no == 0){
            return view('studentHome/studentHome');    
        }
        return view('studentHome/studentTotalBooksIssued')->with('issuedTotal',$issuedTotal);
    }
    
    public function currentBooks(){
        $DB_uid = session('uid');
        $booksIssued = issueBook::where('student_id','=',$DB_uid)->where('return_date','LIKE',null)->simplePaginate(100);
        // dd(session('uid'),$booksIssued);
        return view('studentHome/studentCurrentBooksIssued')->with('data',$booksIssued);
    }

    public function reservedBooks(){
        if(session('uid')==null){
            return redirect('/');
        }
        if(session('reservedBooks')==0){
            return redirect('/student/home');
        }
        $uid = session('uid');
        $uname = session('uname');
        $ResBooks = reservation::where('student_uid','LIKE',$uid)->where('cancelled','=','0')->simplePaginate(4);
        $difference=array();
        $time = now();
        $all = reservation::all();
        $time = $time->toDateTimeString();
        // dd($all);
        foreach($ResBooks as $x){
            $resTime = Carbon::parse($x->reservation_time);
            $uid = session('uname');
            $diff = ($resTime->diffInSeconds($time));

            // $difference = Carbon::createFromTimestampUTC($resTime);
            // dd(gettype($difference),$x,$difference,$resTime,$diff,$ResBooks,$x);
            $saved = reservation::where('reservation_id','=',$x->reservation_id)->update([
                'time' => $diff]);
        }
        $res = $ResBooks->count();
        // dd($ResBooks);
        return view('studentHome/studentCurrentReservation')->with('data',$all)->with('diff',$difference);
    }

    public function cancelReservation($id){
        $sid=session('uid');
        $saved = reservation::where('reservation_id','=',$id)->update(['cancelled' => 1]);
        $resBook = reservation::where('student_uid','=',$sid)->where('cancelled','=','0')->where('time','<','10800')->simplePaginate(4);
        $date = reservation::where('student_uid','=',$sid)->where('cancelled','=','0')->pluck('reservation_time');
        $noRBook = $resBook->count();
        session()->put('reservedBooks',$noRBook);
        // dd($resBook,$date,$noRBook,$saved);
        if($saved){
            return redirect('/student/home')->with('success','You have cancelled the book successfully');
        }
        else{
            return redirect('/student/home')->with('success',"You couldn't cancel the book");
        }
    }

    public function browse(){
        if(session('uid')==null){
            return redirect('/');
        }
        $data = book::all();
        // student is model
        return view('studentHome/studentBrowse',['data' => $data]);
    }

    public function search(){
    	return view('studentHome/studentSearch');
    }

    public function searchResultA(){
    	return view('studentHome/studentSearchAuthors');
    }

    public function searchResultB(){
    	return view('studentHome/studentSearchBooks');
    }

    public function searchResultP(){
    	return view('studentHome/studentSearchPublishers');
    }

    public function reserve(){
    	return view('studentHome/studentReserveBook');
    }

    public function reserveA(Request $req){
        $name = $req -> get('search');
        $books = book::where('author','LIKE',"%{$name}%")->simplePaginate(3);
        // dd(gettype($books),$name,$books);
        return view('studentHome/studentReserveAuthors')->with('data',$books);
    }

    public function reserveB(Request $req){
        $name = $req -> get('search');
        $books = book::where('name','LIKE',"%{$name}%")->simplePaginate(3);
        return view('studentHome/studentReserveBooks')->with('data',$books);
    }

    public function reserveP(Request $req){
        $name = $req -> get('search');
        $books = book::where('publisher','LIKE',"%{$name}%")->simplePaginate(3);
        // dd($books);
        return view('studentHome/studentReservePublishers')->with('data',$books);
    }

    public function settings(){
        if(session('uid')==null){
            return redirect('/');
        }
        return view('studentHome/studentSetting');
    }

    public function logout(){
        session()->put('uid',null);
        session()->put('reservedBooks',null);
        session()->put('uname',null);
        return redirect('/');
    }

    public function contactDetails($id){
        $data = student::where('email',"{$id}")->simplePaginate(3);
        // dd($id,$data);
        return view('studentHome/studentSettingChangeContactDetails',['data' => $data]);
    }

    public function updateContactDetails(Request $req){
        $saved = student::where('idstudents','=',$req->studentId)->update(['email' => $req->email,'contact_details' => $req->phNum]);
        
        if($saved){
            return redirect('/student/settings')->with('success','Contact details updated successfully.');
        }
    }

    public function password($id){
        $data = student::where('email',"{$id}")->simplePaginate(3);
        // dd($data);
        return view('studentHome/studentSettingChangePassword',['data' => $data]);
    }

    public function updatePassword(Request $request){    
        $currentPasswd =$request->get('password');
        $DB_passwd = $request->get('oldPasswd');
        
        $this->validate($request,[
            'password' => 'required|in:'.$DB_passwd,
            'newPassword' => ['required', 
               'min:6', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/']
        ]);
        // dd($currentPasswd,$DB_passwd,$request->newPassword);
        // dd($currentPasswd,$DB_passwd,$request->newPassword,$request->studentId,$request->name,$request->enrollNo,$request->course,$request->sem,$request->div,$request->contact,$request->email);
        if(strcmp($DB_passwd,$currentPasswd)==0){
            $saved = student::where('idstudents','=',$request->studentId)->update(['name' => $request->name,
                'enrollment_number' => $request->enrollNo,
                'course' => $request->course,
                'semester' => $request->sem,
                'division'=>$request->div,
                'contact_details'=>$request->contact,
                'email'=>$request->email,
                'password'=>$request->newPassword]);
            // dd($saved);
            if($saved==1){
                // dd($saved);
                return redirect('/student/settings')->with('success','Your password has been updated successfully.');
            }
            else{
                return redirect('/student/settings')->with('success','Your password has not been updated successfully.');
            }
        }
        else{
            return back()->with('success','Enter the correct credentials.');
        }
    }

    public function store(Request $req){
        $this->validate($req,[
            'name' => 'required',
            'enrollNo' => 'required|min:12',
            'course' => 'required',
            'div' => 'required',
            'sem' => 'required',
            'contact' => 'required|numeric|digits:10|starts_with:5,6,7,8,9|unique:students,contact_details',
            'email' => 'required|unique:students,email',
            'password' => ['required', 
               'min:6', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/']
        ]);

        $student = new student([
            'name' => $req->get('name'),
            'course' => $req->get('course'),
            'semester' => $req->get('sem'),
            'division' => $req->get('div'),
            'enrollment_number' => $req->get('enrollNo'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
            'contact_details' => $req->get('contact'),
        ]);
        $student->save();
        return redirect('/')->with('success','You have registered with us successfully. Please wait until our librarians verify your details, it could take upto 24 working hours.');
    }

    public function getStudents(){
        $data = student::all();
        // student is model
        return view('show-student',['data' => $data]);
    }

    public function destroy($id){
        $data = student::find($id)->delete();
        if($data){
            return redirect('/admin-get-students')->with('success','You have removed the student successfully.');
        }
    }

    public function edit($id){
        $data = student::find($id);
        return view('edit-student',['data' => $data]);
    }
    
    public function update(Request $request){
        $saved = student::where('idstudents','=',$request->studentID)->update(['name' => $request->name,
         'enrollment_number' => $request->enrollNo,
         'course' => $request->course,
         'semester' => $request->sem,
         'division'=>$request->div,
         'contact_details'=>$request->contact,
         'email'=>$request->email,
         'password'=>$request->password]);
        
        if($saved){
            return redirect('/admin-get-students')->with('success','Student Updated Successfully');
        }
    }

    public function reserveBook($user,$id){
        $DB_reserved = DB::table('reservations')->where('student_id',$user)->where('cancelled','=','0')->where('time','<','10800')->get();
        $resu = $DB_reserved->count();
        // dd($resu,$DB_reserved);
        $x=0;
        session()->put('reservedBooks',$resu);
        // dd($resu,session()->get('reservedBooks'));
        foreach($DB_reserved as $res){
            if(strcmp($res->book_id,$id) && $res->time>10800){
                return redirect('/student/home')->with('success','You have already reserved this book.');    
            }else if($resu>2){
                return redirect('/student/home')->with('success','You can not reserve more than 3 books.');
            }else{
                $x=1;
            }
        }
        $time = now();
        $time = $time->toDateTimeString();
        $uid = session('uid');
        $book = book::find($id);
        $bookName = $book->name;
        $bookAuthor = $book->author;
        // dd($time,$user,$id,$bookName,$bookAuthor);
        $time = now();
        $time = $time->toDateTimeString();
        $resTime = \Carbon\Carbon::parse($time);
        $diff = ($resTime->diff($time));
        $difference = $diff->h;
        $reserved = new reservation([
            'student_id' => $user,
            'student_uid' => $uid,
            'book_id' => $id,
            'book_name' => $bookName,
            'book_author' => $bookAuthor,
            'reservation_time' => $time,
            'time'=>$difference,
        ]);      
        $numBooks = DB::table('books')->where('id_books')->pluck('number_of_books');
        // dd($numBooks);
        $reserved->save();
        $DB_reserved = DB::table('reservations')->where('student_id',$user)->where('cancelled','=','0')->where('time','<','10800')->get();
        $res = $DB_reserved->count();
        // dd($res+1);
        session()->put('reservedBooks',$res);
        return redirect('/student/home')->with('success','Collect the reserved book within 3 hours starting from the time of reservation or the reservation will be reversed.');
    }

    public function login(Request $req){
        $uname = $req -> get('email');
        $password = $req -> get('password');
        $DB_uname = DB::table('students')->where('email','=',$uname)->pluck('email')->first();
        $approved = DB::table('students')->where('email','=',$uname)->pluck('approval')->first();
        $DB_passwd = DB::table('students')->where('email','=',$uname)->pluck('password')->first();
        $ResBooks = reservation::where('student_id','LIKE',$uname)->where('cancelled','=','0')->simplePaginate(4);
        $time = now();
        $time = $time->toDateTimeString();
        // dd($all);
        foreach($ResBooks as $x){
            $resTime = Carbon::parse($x->reservation_time);
            $uid = session('uname');
            $diff = ($resTime->diffInSeconds($time));

            // $difference = Carbon::createFromTimestampUTC($resTime);
            // dd(gettype($difference),$x,$difference,$resTime,$diff,$ResBooks,$x);
            $saved = reservation::where('reservation_id','=',$x->reservation_id)->update([
                'time' => $diff]);
        }
        $res = $ResBooks->count();

        // dd($ResBooks,$res);
        $DB_uid = DB::table('students')->where('email','=',$uname)->pluck('idstudents')->first();
        // dd(gettype($DB_uid),$DB_uid);
        $email = DB::table('students')->where('email',$uname)->pluck('email')->first();
        // dd($email,$DB_uid,(gettype($DB_uid)));
        $DB_issuedBooks = issueBook::where('student_id','=',$DB_uid)->where('return_date','LIKE',null)->simplePaginate(100);
        $DB_total = DB::table('issue_books')->where('student_id',$DB_uid)->simplePaginate(100);
        $ResBooks = reservation::where('student_id','LIKE',$uname)->where('cancelled','=','0')->where('time','<=',10800)->simplePaginate(4);
        $numIssue = $DB_issuedBooks->count();
        // dd($DB_issuedBooks,$numIssue);
        $totalNum = $DB_total->count();
        // dd($DB_total,$totalNum);
        // dd($DB_issuedBooks,$numIssue,$DB_total,$totalNum);
        $res = $ResBooks->count();

        if(strcmp($uname,$DB_uname)==0){
            if(strcmp($password,$DB_passwd)==0){
                if($approved==1){
                    $req -> session()->put('uname',$DB_uname);
                    $req -> session()->put('uid',$DB_uid);
                    $req -> session()->put('reservedBooks',$res);
                    $req -> session()->put('issuedBooks',$numIssue);
                    $req -> session()->put('totalBook',$totalNum);
                    // dd($DB_reserved,$res,$DB_uname);
                    // return $this->view($DB_uid);
                    // $data = $req->session()->get('uname');
                    // dd($DB_uname,$DB_uid,$data);
                    
                    return redirect('/student/home');
                }
                else if($approved==2){
                    $data = student::find($DB_uid)->delete();
                    return redirect('/')->with('failure','Your application has been been rejected. Contact the librarian for more details.');
                }
                else{
                    return redirect('/')->with('failure','Your application has not been accepted by the librarian. Please contact library for more details.');
                }
                // return view('studentHome/studentHome',['uname' => $DB_uname,'uid' => $DB_uid]);
            }
            else{
                return redirect('/')->with('failure','Enter Correct Password');
            }
        }
        else{
            return redirect('/')->with('failure','Enter Correct Credentials');
        }
    }
}