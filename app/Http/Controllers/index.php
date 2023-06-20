<?php

namespace App\Http\Controllers;

use App\Models\matkul;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class index extends Controller
{
    public function indexAction(Request $request){
        if(Session::has('login') && session('login')){
            return $this->indexView();
        }else{
            return redirect()->route('login');
        }
    }
    public function indexView(){
        $jumlah_matkul = matkul::all()->count();
        $jumlah_mahasiswa = mahasiswa::all()->count();
        $indexData = [
            'jumlah_mahasiswa' => $jumlah_mahasiswa,
            'title' => 'Dashboard',
            'jumlah_matkul' => $jumlah_matkul
        ];
        return view('index', $indexData);
    }
}