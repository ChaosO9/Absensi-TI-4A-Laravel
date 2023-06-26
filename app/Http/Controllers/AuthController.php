<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mahasiswa_admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function viewRegistrasiAdmin(){
        return view('registrasiadmin');
    }

    public function viewLogin(){
        return view('login');
    }

    public function viewLoginmhs(){
        return view('login_mahasiswa');
    }

    public function registerAdmin(Request $request){
        // $request->validate([
        //     'nim' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'password2' => 'required',
        //     'token' => 'required'
        // ]);

        $user = new User();

        $admin_data = Mahasiswa_admin::cek_mahasiswa($request->nim);
        $admin_adatidak = Mahasiswa_admin::cek_admin($request->nim);
        $user -> nim = intval($request->nim);
        $password = $request->password;
        $password_confirmation = $request->password2;
        $user -> password = Hash::make($password);
        $user -> email = $admin_data->pluck('email')->first();
        $user -> roles = "Admin-Mahasiswa";
        $user -> nama = $admin_data->pluck('nama')->first();
        $token = $request->token;

        if($token != 'ADMINJUJUR!'){
            Cache::put('failed', 'Token yang dimasukkan salah', 2);
            return redirect('registrasiadmin');
        }else if($password != $password_confirmation){
            Cache::put('failed', 'Password yang dimasukkan salah', 2);
            return redirect('registrasiadmin');
        }else if($admin_data -> isEmpty() || $admin_data === null){
            Cache::put('failed', 'Anda tidak terdaftar sebagai mahasiswa TI 4A!', 2);
            return redirect('registrasiadmin');
        }else if($admin_adatidak === intval($request->nim)){
            Cache::put('failed', 'Admin sudah terdaftar!', 2);
            return redirect('registrasiadmin');
        }

        Cache::put('success', 'Selamat akun Anda terdaftar!', 2);
        $user -> save();
        return redirect('registrasiadmin');
    }

    public function login(Request $request){
        if($request->session()->has('login') && session('login')){
            return redirect()->route('index');
        }

        $credentials = $request->only('email_or_nim', 'password');
        $NimOrEmail = $credentials['email_or_nim'];
        $field = filter_var($NimOrEmail, FILTER_VALIDATE_EMAIL) ? 'email' : 'nim';
        if ($field == 'email'){$email = $credentials['email_or_nim'];}else{$email ='';}

        $credentials[$field] = $NimOrEmail;
        unset($credentials['email_or_nim']);
        $user = User::role('Super Admin')->where($field , $NimOrEmail);

        if (Auth::attempt($credentials)){
            if($user){
                $data_users_admins = Mahasiswa_admin::data_admin_dan_mahasiswa($credentials[$field], $email);
                session(['qr_created' => false]);
                session(['end_session_time' => '']);
                session(['session_time' => '']);
                session(['hash' => '']);
                session(['date' => '']);
                session(['clearCountdown' => true]);
            }else{
                $data_users_admins = Mahasiswa_admin::data_admin_dan_mahasiswa($credentials[$field], $email);
            }

            foreach($data_users_admins as $data_admin){
                session(['admin_id' => $data_admin->id]);
                session(['admin_user_email'=> $data_admin->email]);
                session(['admin_user_name' => $data_admin->nama]);
                session(['admin_user_foto' => $data_admin->foto]);
                session(['admin_last_login' => $data_admin->last_login]);
            }
            return redirect() -> route('index');
        }

        return back() -> with('failed','NIM/Email/Password Anda salah!');
    }

    public function logout(){
        echo'<script>localStorage.removeItem("countdown");</script>';
        date_default_timezone_set('Asia/Singapore');
        $time = date('d-m-y H:i:s', time());
        Mahasiswa_admin::where('id', session('admin_id'))->update(['last_login' => $time]);
        Session::flush();
        Auth::logout();
        return redirect() -> route('login');
    }
}