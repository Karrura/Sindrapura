<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminPimpinan as Admin;
use App\Models\Penduduk;
use Session;

class LoginController extends Controller
{
    public function prosesLogin(Request $request)
    {
    	// dd($request);
    	$data_admin = Admin::cekLog($request->nik, $request->password);
    	$data_penduduk = Penduduk::cekLog($request->nik, $request->password);
    	// dd($data_admin, $data_penduduk);
    	if($data_admin){
    		Session::put('role', $data_admin->role);
    		Session::put('id', $data_admin->id_penduduk);
    		Session::put('foto', $data_admin->foto);
    		Session::put('nama', $data_admin->nama);
    	}else if($data_penduduk){
    		Session::put('role', 'Penduduk');
    		Session::put('id', $data_penduduk->id);
    		Session::put('foto', $data_penduduk->foto);
    		Session::put('nama', $data_penduduk->nama);
    	}

    	if($data_admin || $data_penduduk){
    		return redirect('/profile');
    	}else{
    		return back()->with('error', "NIK atau Password salah!");
    	}
    }

    public function logout(Request $request)
    {
    	$request->session()->forget('id');
    	$request->session()->forget('role');
        $request->session()->flush();
        return redirect('/')->with("success","Berhasil Logout!");
    }

    public function regist(Request $request)
    {
        // dd($request);
        $namafile = null;
        if($request->file('foto')){
            $pict = $request->foto;
            $namafile = time().rand(100, 99).".".$pict->getClientOriginalName();
            $request->foto->move(public_path('foto_penduduk'), $namafile);
        }

        $store = Penduduk::create([
            'nik'               => $request->nik,
            'nama'              => $request->nama,
            'password'          => \Hash::make($request->password),
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tgl_lahir,
            'jenkel'            => $request->jenkel,
            'alamat'            => $request->alamat,
            'pekerjaan'         => $request->pekerjaan,
            'stts_perkawinan'   => $request->stts_perkawinan,
            'pendidikan'        => $request->pendidikan,
            'nohp'              => $request->nohp,
            'foto'              => $namafile,
        ]);

        if($store){
            return redirect('/')->with('success', 'Berhasil menambahkan data '.$request->nama.'. Silahkan login dengan NIK dan Password.');
        }else{
            return redirect('/')->with('error', 'Gagal menambahkan data ');
        }
    }
}
