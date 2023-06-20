<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa_admin extends Model
{
    use HasFactory;
    protected $table = 'users';


    public static function cek_mahasiswa($nim){
    $result = DB::table('akun_mahasiswa')
    ->join('mahasiswa', 'akun_mahasiswa.nim', '=', 'mahasiswa.nim')
    ->select('akun_mahasiswa.*', 'mahasiswa.*')
    ->where('akun_mahasiswa.nim', $nim)
    ->get();

    return $result;
    }

    public static function cek_admin($nim){
        $result = Mahasiswa_admin::where('nim', $nim)->first();

        if($result){
            $nimValue = intval($result->nim);
            return $nimValue;
        } else {
            return 0;
        }
    }

    public static function data_admin($nim, $email){
        $result = DB::table('users')
        ->join('mahasiswa', 'users.nim', '=', 'mahasiswa.nim')
        ->join('akun_mahasiswa', 'users.nim', '=', 'akun_mahasiswa.nim')
        ->select('users.*', 'akun_mahasiswa.email', 'akun_mahasiswa.nim', 'mahasiswa.foto')
        ->where('akun_mahasiswa.email', $email)
        ->orWhere('akun_mahasiswa.nim', $nim)
        ->get();

        return $result;
    }
}
