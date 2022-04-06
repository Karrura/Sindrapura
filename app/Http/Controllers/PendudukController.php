<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penduduk::get();
        return view('penduduk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect('penduduk')->with('success', 'Berhasil menambahkan data '.$request->nama);
        }else{
            return redirect('penduduk')->with('error', 'Gagal menambahkan data '.$request->nama);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request, $id);
        $data = Penduduk::where('id', $id)->first();
        $pass = $data->password;
        $foto = $data->foto;
        if($request->password == null){
            $password = $pass;
        }else{
            $password = \Hash::make($request->password);
        }
        $namafile = null;
        if($request->file('foto')){
            $pict = $request->foto;
            $namafile = time().rand(100, 99).".".$pict->getClientOriginalName();
            $request->foto->move(public_path('foto_penduduk'), $namafile);
        }else{
            $namafile = $foto;
        }
        // dd($namafile);
        $update = Penduduk::where('id', $id)->update([
            'nik'               => $request->nik,
            'nama'              => $request->nama,
            'password'          => $password,
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

        if($update){
            return redirect('penduduk')->with('success', 'Berhasil mengubah data '.$request->nama);
        }else{
            return redirect('penduduk')->with('error', 'Gagal ,engubah data '.$request->nama);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $data = Penduduk::where('id', $id)->first();
        $nama = $data->nama;
        $delete = Penduduk::where('id', $id)->delete();

        if($delete){
            return redirect('penduduk')->with('success', "Berhasil menghapus data ".$nama);
        }else{
            return redirect('penduduk')->with('error', "Gagal menghapus data!");
        }
    }
}
