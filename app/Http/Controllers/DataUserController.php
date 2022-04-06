<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_penduduk = session('id');
        // dd($id_penduduk);
        $d = Penduduk::where('id', $id_penduduk)->first();

        return view('user.index', compact('d'));
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
            return redirect('datauser')->with('success', 'Berhasil mengubah data '.$request->nama);
        }else{
            return redirect('datauser')->with('error', 'Gagal ,engubah data '.$request->nama);
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
        //
    }
}
