<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\librarian;

class adminHome extends Controller
{
    public function view(){
        if(session('username')==null){
            return redirect('/homeAdmin');
        }
        $uname = session()->get('username');
        return redirect('/home-admin');
        dd($uname);
    }

    public function home(){
        if(session('username')==null){
            return redirect('/homeAdmin');
        }
        $librarians = librarian::all();
        // dd($librarians);
        return view('adminHome/home',['data'=>$librarians]);
    }

    public function addLib(){
        if(session('username')==null){
            return redirect('/homeAdmin');
        }
        return view('adminHome/addLibrarian');
    }

    public function addLibrarian(Request $req){
        $save = new librarian([
            'name' => $req->get('name'),
            'email'=> $req->get('email'),
            'password'=> $req->get('password')
        ]);
        $save->save();
        return redirect('/admin/home')->with('success','Librarian Added Successfully.');        
    }

    public function editLib($id){
        if(session('username')==null){
            return redirect('/homeAdmin');
        }
        $lib = librarian::find($id);
        return view('adminHome/editLibrarian',['data'=>$lib]);
        dd($lib);
    }
 
    public function update(Request $req){
        if(session('username')==null){
            return redirect('/homeAdmin');
        }
        $save = librarian::where('lib_id','=',$req->get('id'))
        ->update([
            'name'=>$req->get('name'),
            'email'=>$req->get('email'),
            'password'=>$req->get('password')
        ]);
        return redirect('/home-admin');
        // dd($req->get('id'));
    }

    public function logout(){
        session()->put('username',null);
        return redirect('/homeAdmin');
    }

    public function removeLib($id){
        if(session('username')==null){
            return redirect('/homeAdmin');
        }
        $data = librarian::find($id)->delete();
        if($data){
            return redirect('/home-admin')->with('success','Librarian removed successfully.');
        }
    }
}
