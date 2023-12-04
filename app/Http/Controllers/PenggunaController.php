<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PenggunaController extends Controller
{
    public function tampildata()
    {
        $pengguna = Pengguna::all(); // Mengambil semua data dari tabel pengguna
        $title = "data Pengguna";
        return view('datapengguna', compact('pengguna', 'title'));
    }
    public function tambahpegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
     
            'nama' => 'required',
            'no_telfon' => 'required|numeric',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'akses' => 'required',
    
        ],[
            'no_telfon.numeric' => 'Nomor telepon harus berupa angka.', // Pesan khusus jika no_telfon bukan angka
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
           
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }

$data=[
    "nama"=>$request->nama,
    "no_telfon"=>$request->no_telfon,
    "username"=>$request->username,
    "password"=>bcrypt($request->password),
    "alamat"=>$request->alamat,
    "email"=>$request->email,
    "akses"=>$request->akses,
];
        Pengguna::create($data);
        Alert::success('Success Title', 'Berhasil Tambah Data');
        return back();

    }

    public function updatepegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
     
            'nama' => 'required',
            'no_telfon' => 'required|numeric',
            'username' => 'required',
           
            'alamat' => 'required',
            'email' => 'required',
            'akses' => 'required',
    
        ],[
            'no_telfon.numeric' => 'Nomor telepon harus berupa angka.', // Pesan khusus jika no_telfon bukan angka
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
           
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }

$data=[
    "nama"=>$request->nama,
    "no_telfon"=>$request->no_telfon,
    "username"=>$request->username,

    "alamat"=>$request->alamat,
    "email"=>$request->email,
    "akses"=>$request->akses,
];
        Pengguna::where('id',$request->id)->update($data);
        Alert::success('Ubah data', 'Berhasil Ubah Data');
        return back();

    }
    public function hapuspegawai($id){
         // Lakukan proses penghapusan data berdasarkan $id
     Pengguna::find($id)->delete();
    // ...

    return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }

}
