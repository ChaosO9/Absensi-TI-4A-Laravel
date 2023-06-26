<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswa_controller extends Controller
{
    public function lihatmhs(){
        $this->authorize('read mahasiswa');

        $data_mahasiswa = mahasiswa::all();
        return view('lihatmhs', [
            'data_mahasiswa' => $data_mahasiswa,
            'title' => 'Lihat Mahasiswa'
            ]
        );
    }

    public function create_mahasiswa(){
        $this->authorize('create mahasiswa');
        return view('tambah_mahasiswa',[
            'title' => 'Form Mahasiswa'
        ]);
    }

    public function create_mahasiswa_daftar(Request $request){
        $this->authorize('create mahasiswa');
        $nim_in_database = mahasiswa::where('nim', intval($request->nim))->get();
        if(!count($nim_in_database) === 0){
            return back()->with('error', 'NIM Yang Dimasukkan Telah Dipakai!');
        }
        $nim = intval($request->nim);
        $nama = $request->nama;
        $nomor_absen = $request->nomor_absen;
        $jenis_kelamin = $request->jenis_kelamin;
        $image = $request->file('image');
        mahasiswa::create([
            'nim' => $nim,
            'nama' => $nama,
            'nomor_absen' => $nomor_absen,
            'jeniskelamin' => $jenis_kelamin,
            'foto' => $nim . '_photo_profile'. '.' . $image->getClientOriginalExtension()
        ]);

        if ($request->hasFile('image')) {
            $imageName = $nim . '_photo_profile'. '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
        }
        return back()->with('success', 'Data Mahasiswa Berhasil Dimasukkan!');
    }

    public function update_mahasiswa(string $data_mhs){
        $this->authorize('update mahasiswa');

        $jsonData = urldecode($data_mhs);
        $data_mahasiswa = json_decode($jsonData, true);

        $nim = $data_mahasiswa['nim'];
        $nama = $data_mahasiswa['nama'];
        $nomor_absen = $data_mahasiswa['nomor_absen'];
        $jeniskelamin = $data_mahasiswa['jeniskelamin'];
        $foto = $data_mahasiswa['foto'];

        // return var_dump($data_mahasiswa);

        return view('update_mahasiswa', [
            'nim' => $nim,
            'nama' => $nama,
            'nomor_absen' => $nomor_absen,
            'jenis_kelamin' => $jeniskelamin,
            'foto' => $foto,
            'title' => 'Update Mahasiswa',
        ]);
    }

    public function update_mahasiswa_proses(Request $request, string $nim_asal){
        $this->authorize('update mahasiswa');

        $first_nim = intval($nim_asal);
        $nim = $request->nim;
        $mahasiswa = mahasiswa::where('nim', intval($nim));
        $nim_in_database = $mahasiswa->get();
        foreach($nim_in_database as $d) { $nim_ = $d->nim;}
        if(!is_null($nim_in_database) && $nim_ !== $first_nim){
            return back()->with('error', 'NIM Yang Dimasukkan Telah Dipakai!');
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $request->nim . '_photo_profile'. '.' . $image->getClientOriginalExtension();
            $mahasiswa->update(['foto' => $imageName,]);

            $destinationPath = public_path('img');
            // Check if the file already exists
            if (file_exists($destinationPath . '/' . $imageName)) {
                // Delete the existing file
                unlink($destinationPath . '/' . $imageName);
            }
            $image->move($destinationPath, $imageName);
        }

        $mahasiswa->update(
            [
            'nim' => intval($nim),
            'nama' => $request->nama,
            'nomor_absen' => $request->nomor_absen,
            'jeniskelamin' => $request->jenis_kelamin,
            ]
        );
        return back()->with('success', 'Data mahasiswa berhasil diubah!')->with('success2', 'Mohon kembali ke menu LIhat Mahasiswa untuk melihat perubahan');
    }

    public function delete_mahasiswa_proses(string $nim){
        $this->authorize('delete mahasiswa');
        mahasiswa::where('nim', intval($nim))->delete();

        return redirect()->route('lihatmhs')->with('deleted', 'Data mahasiswa berhasil dihapus!');
    }
}
