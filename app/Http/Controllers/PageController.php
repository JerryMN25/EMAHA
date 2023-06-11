<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class PageController extends Controller
{
    public function home(){
        return view('home', ['key' => 'home']);
    }
    
    public function profile(){
        return view('profile', ['key' => 'profile']);
    }   
    
    public function student(){
        $mhs = Mahasiswa::paginate(10);
        return view('student', ['key' => 'student', 'mhs' => $mhs]);
    }

    public function search(Request $req){
        $cari = $req->q;
        $mhs = Mahasiswa::where('nama', 'Like', '%'.$cari.'%')->orWhere('nim', 'like', '%'.$cari.'%')->orderBy('id', 'desc')->paginate(10);
        $mhs->appends($req->all());
        return view('student', ['key' => 'student', 'mhs' => $mhs]);
    }

    public function formadd(){
        return view('formadd', ['key' => 'student']);
    }

    public function save(Request $req){
        $minat = implode(",", $req->get('minat'));
        Mahasiswa::create([
            'nim' => $req->nim,
            'nama' => $req->nama,
            'gender' => $req->gender,   
            'prodi' => $req->prodi,
            'minat' => $minat
        ]);

        return redirect("/student")->with('flash', 'Data Telah Tersimpan!');
    }

    public function formedit($id){
        $mhs = Mahasiswa::find($id);

        return view('formedit', ['key' => 'student', 'mhs' => $mhs]);
    }

    public function update($id, Request $req){
        $mhs = Mahasiswa::find($id);
        $minat = implode(",", $req->get('minat'));
        $mhs->nim = $req->nim;
        $mhs->nama = $req->nama;
        $mhs->gender = $req->gender;
        $mhs->prodi = $req->prodi;
        $mhs->minat = $minat;
        $mhs->save();

        return redirect("/student")->with('flash', 'Data Berhasil Di Update!');
    }

    public function delete($id){
        $mhs = Mahasiswa::find($id);
        $mhs->delete();

        return redirect("/student")->with('flash', 'Data Berhasil Terhapus!');
    }
    
    public function contact(){
        return view('contact', ['key' => 'contact']);
    }
}
