<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MhsAPIController extends Controller
{
    public function read(){
        $mhs = Mahasiswa::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil ditampilkan',
            'data' => $mhs
        ], 200);
    }
    // http://127.0.0.1:8000/api/mahasiswa/read

    public function create(Request $request){
        $mhs = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $request->minat
        ]);

        if($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil ditambahkan'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Berhasil ditambahkan'
            ], 400);
        }
    }
    // http://127.0.0.1:8000/api/mahasiswa/create

    public function update($id, Request $request){
        $mhs = Mahasiswa::Find($id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $request->minat
        ]);

        if($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil diubah'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Berhasil diubah'
            ], 400);
        }
    }
    // http://127.0.0.1:8000/api/mahasiswa/update/{id}

    public function delete($id){
        $mhs = Mahasiswa::Find($id);
        $mhs->delete();

        if($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil dihapus'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Berhasil dihapus'
            ], 400);
        }
    }
    // http://127.0.0.1:8000/api/mahasiswa/delete/{id}

}