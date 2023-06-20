<?php

namespace App\Http\Controllers;

use App\Models\matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class matkul_controller extends Controller
{
    public function viewMatkul(){
        if(!Session::has('login') && !session('login')){
            return redirect()->route('login');
        }

        $data_matkul = matkul::join('dosen', 'matkul.id_dosen', '=', 'dosen.kode_dosen')
            ->select('matkul.*', 'dosen.nama_dosen')
            ->get();

        return view('lihatmatkul', [
            'data_matkul' => $data_matkul,
            'title' => 'Lihat Matkul'
        ]);
    }
}