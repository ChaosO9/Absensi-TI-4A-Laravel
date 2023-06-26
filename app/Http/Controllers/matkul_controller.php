<?php

namespace App\Http\Controllers;

use App\Models\matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class matkul_controller extends Controller
{
    public function viewMatkul(){
        $this->authorize('read matkul');

        $data_matkul = matkul::join('dosen', 'matkul.id_dosen', '=', 'dosen.kode_dosen')
            ->select('matkul.*', 'dosen.nama_dosen')
            ->get();

        return view('lihatmatkul', [
            'data_matkul' => $data_matkul,
            'title' => 'Lihat Matkul'
        ]);
    }
}
