<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    //
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        //return $email." ".$password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }else{
            return 'username atau password salah';
        }
    }

    function register (Request $request){
        //dd ($request); //untuk debug apapun 
        
        //untuk mengecek apakah data kosong dan sudah ada di database

        $email = $request->email;
        $name = $request->nama;
        $password = $request->password;
        $password_confirm = $request->password_confirm;

        //mengecek email
        if($email == null){
            return 'email kosong';
        }

        $data = User::where('email',$email)->first();
        if($data!= null){
            return 'email sudah ada';
        }

        //mengecek nama
        if($name == null){
            return 'nama kosong';
        }

        $data = User::where('name',$name)->first();
        if($data!= null){
            return 'nama sudah ada';
        }
        
        //mengecek password
        if($password == null){
            return 'password kosong';
        }

        $data = User::where('password',$password)->first();
        if($data!= null){
            return 'password sudah ada';
        }

        //pengecekan konfirmasi password
        if($password_confirm == null){
            return 'password konfirm kosong';
        }

        if($password != $password_confirm){
            return "password tidak sukses";
        }
        //akhir pengecekan

        //untuk menginputkan data kedalam database
        $user = new User();
        $user->email = $email;//$request->input('email');
        $user->name =  $name;//$request->input('nama');
        $user-> password = bcrypt($request->input('password'));
        $user->save();

        //digunakan untuk setelah registrasi dia tidak usah login lagi tetapi langsung ke halaman dashboar
        $id = $user->id;
        Auth::loginUsingId($id);

        return redirect('dashboard');
    }


}
