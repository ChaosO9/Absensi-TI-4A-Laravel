<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class absensi extends Controller
{
    //
    // public function __construct(){
    //     $this->authorize('start absensi');
    // }

    public function absensiAction(){
        $this->authorize('start absensi');
        $data_matkul = matkul::all();

        date_default_timezone_set('Asia/Singapore');
        $timestamp = time();
        $englishDay = date('l', $timestamp);

        $data_jadwal = Jadwal::select('jadwal.*', 'matkul.nama_matkul', 'matkul.id_dosen', 'dosen.nama_dosen')
        ->join('matkul', 'jadwal.id_matkul', '=', 'matkul.id_matkul')
        ->join('dosen', 'matkul.id_dosen', '=', 'dosen.kode_dosen')
        ->where('jadwal.hari', $englishDay)
        ->get();


        $jadwal_jam = [];
        foreach ($data_jadwal as $d){
            $parts_mulai = explode(':', $d->mulai);
            $parts_akhir = explode(':', $d->akhir);
            $hour_mulai = $parts_mulai[0];
            $minute_mulai = $parts_mulai[1];
            $hour_akhir = $parts_akhir[0];
            $minute_akhir = $parts_akhir[1];
            $jam = $hour_mulai . '.' . $minute_mulai . ' - ' . $hour_akhir . '.' . $minute_akhir;
            array_push($jadwal_jam, $jam);
        }


        return view('absensi', [
            'jadwal_jam' => $jadwal_jam,
            'data_jadwal' => $data_jadwal,
            'data_matkul' => $data_matkul,
            'title' => 'Absensi'
        ]);
    }

    public function absensiMatkul(Request $request){
    if (request()->isMethod('POST')){
    if (request()->has('submit')){
            //$selectedOption = request('matkul');
            // Get Time
            date_default_timezone_set('Asia/Singapore');
            $timestamp_ = time();
            session(['session_time' => date('d-m-y H:i:s', $timestamp_)]);
        if (Session::get('qr_created') == false){
                $randomString = uniqid();
                session(['hash' => password_hash($randomString, PASSWORD_DEFAULT)]); //Original password
                $hash2 = password_hash(Session::get('hash'), PASSWORD_DEFAULT); //Hashed password

                // SQL Session Process
                // $sql_sesi = mysqli_query($koneksi, "INSERT INTO log_sesi (waktu_sesi, id_matkul, kode) VALUES
                // ('$_SESSION['session_time']', '$selectedOption', '$hash2')");

                // Session ended
                $end_time = strtotime('+1 minutes', $timestamp_);
                session(['end_session_time' => date('d-m-y H:i:s', $end_time)]);
            }
        }
    }

        $matkul = $request->input('matkul');
        $url = route('absensi_matkul').'?'.http_build_query(['matkul' => $matkul]);
        return Redirect::to($url)->with('refresh', true);
    }

    public function absensiRefreshed(){
        session(['end_session_time' => '']);
        session(['session_time' => '']);
        session(['hash' => '']);
        session(['qr_created' => false]);
        session(['login' => true]);
        session(['date' => '']);
        session(['clearCountdown' => true]);
        return redirect()->route('absensi');
    }
}