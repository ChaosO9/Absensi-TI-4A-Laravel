<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswa_controller extends Controller
{
    public function lihatmhs(){
        if(!Session::has('login') && !session('login')){
            return redirect()->route('login');
        }

        $data_mahasiswa = mahasiswa::all();
        return view('lihatmhs', [
            'data_mahasiswa' => $data_mahasiswa,
            'title' => 'Lihat Mahasiswa'
            ]
        );
    }
}