<?php

namespace App\Http\Controllers;

use App\Models\Jenisbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JenisbarangController extends Controller
{
    public function index()
    {
        $jenisbarang = Jenisbarang::all(); // Mengambil semua data dari tabel pengguna
        $title = "Data Jenis Barang";
        return view('jenisbarang', compact('jenisbarang', 'title'));
    }
    public function tambahjenis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_jenis" => "required"
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
           
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        $data=[
            "nama_jenis"=>$request->nama_jenis
        ];
        Jenisbarang::create($data);
        Alert::success('Tambah Jenis', 'Berhasil Tambah Data');
        return back();
    }
    public function updatejenis(Request $request) {
        $validator = Validator::make($request->all(), [
            "nama_jenis" => "required"
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
           
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        $data=[
            "nama_jenis"=>$request->nama_jenis
        ];

        Jenisbarang::where('id',$request->id)->update($data);
        Alert::success('Ubah data', 'Berhasil Ubah Data');
        return back();
        
    }
}
