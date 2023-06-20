<?php

namespace App\Http\Controllers;

use App\Models\matkul;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class rekapan extends Controller
{
    public function rekapan_sementaraAction(){
        if(!Session::has('login') && !session('login')){
            return redirect()->route('login');
        }

        $data_matkul = matkul::all();
        $data_mahasiswa = mahasiswa::all();
        return view('rekapan', [
            'data_matkul' => $data_matkul,
            'data_mahasiswa' => $data_mahasiswa,
            'title' => 'Rekapan Sementara'
        ]);
    }

    public function rekapan_tetapAction(){
        if(!Session::has('login') && !session('login')){
            return redirect()->route('login');
        }

        $data_matkul = matkul::all();
        $data_mahasiswa = mahasiswa::all();
        return view('rekapantetap', [
            'data_matkul' => $data_matkul,
            'data_mahasiswa' => $data_mahasiswa,
            'title' => 'Rekapan Tetap'
        ]);
    }
}