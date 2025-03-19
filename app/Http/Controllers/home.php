<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\librarian;
use Illuminate\Http\Request;

class home extends Controller
{
	public function view()
    {
        if(session('username')){
            return redirect('/home-admin');
        }
        if(session('uname')){
            return redirect('/librarian/home');
        }
        return view('home/studentLogin');
    }

    public function loginA()
    {  
        if(session('uid')){
            return redirect('/student/home');
        }
        if(session('uname')){
            return redirect('/librarian/home');
        }
        return view('home/loginA');
    }

    public function loginL()
    {
        if(session('uid')){
            return redirect('/student/home');
        }
        if(session('username')){
            return redirect('/home-admin');
        }
        return view('home/loginL');
    }

    public function signUp()
    {
        if(session('uid')){
            return redirect('/student/home');
        }
        if(session('username')){
            return redirect('/home-admin');
        }
        if(session('uname')){
            return redirect('/librarian/home');
        }
        return view('home/studentSignup');
    }

    public function loginLibrarian(Request $req){
        $email = $req->get('email');
        $passwd= $req->get('password');
        $librarians = librarian::all();
        $x=0;
        // dd($librarians);
        foreach($librarians as $a){
            if(strcmp($a->email,$email)==0){
                session()->put('uname',$email);
                return redirect('/librarian/home');
                $x=1;
            }
        }
        if($x==0){
            return redirect('/homeAdmin')->with('failed','Enter correct credentials.');
        }
        // dd($admin,$passwd);
    }

    public function loginAdmin(Request $req){
        $admin = $req->get('uname');
        $passwd = $req->get('passwd');
        $admins = admin::all();
        $x=0;
        foreach($admins as $a){
            if(strcmp($a->username,$admin)==0){
                if(strcmp($a->password,$passwd)==0){
                    session()->put('username',$admin);
                    return redirect('/admin/home');
                    $x=1;
                }
            }
        }
        if($x==0){
            return redirect('/homeAdmin')->with('failed','Enter correct credentials.');
        }
        // dd($admin,$passwd);
    }
}
