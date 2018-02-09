<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Awalan Login
Route::get('/login',function(){
    return view('login');
})->name('login');

//mengautentifikasikan proses login
Route::post('/login', 'UserController@Login');
// ending login

//Register
Route::get('/register',function(){
    if(Auth::check()){
        return redirect('dashboard');
    }
    return view('register');
})->name('register');
Route::post('/register', 'UserController@register');

//fungsi logout
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get('lomba/{id}','LombaController@detail');

//proteksi untuk sebelum dia login makan akan selalu diarahkan kembali ke halaman login
Route::middleware(['auth'])->group(function () {
   Route::get('/user',function(){
       return view('user');
   });

   //setelah login akan mengarah ke halaman dashboard
   Route::get('/dashboard',function(){
    return view('dashboard');
    });

    Route::get('/admin',function(){
        $role = Auth::user()->role;
        if($role != 'admin'){
            return 'kowe ora entuk mlebu bos';
        }
        return view('admin.index');
    });

    Route::get('lomba','LombaController@index');

    //untuk menambah dan melihat detail
    Route::get('lomba/add','LombaController@add');
    Route::post('lomba','LombaController@create');

    //untuk mengedit
    Route::get('lomba/{id}/edit','LombaController@edit'); //untuk menampilkan
    Route::post('lomba/{id}/edit','LombaController@update'); //untuk prosesnya

    //untuk menghapus
    Route::get('lomba/{id}/delete','LombaController@delete'); //untuk menampilkan
    Route::get('lomba/{id}/confirmDelete','LombaController@confirmDelete'); //untuk prosesnya

});





