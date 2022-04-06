<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perangkat;
use App\Models\Penduduk;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = Penduduk::get();
        $data = Perangkat::join('penduduk', 'perangkat.id_penduduk', '=', 'penduduk.id')
            ->select('penduduk.nama', 'perangkat.jabatan', 'perangkat.status', 'perangkat.id', 'perangkat.mulai_tugas', 'penduduk.nik', 'penduduk.nohp', 'penduduk.foto')
            ->get();
        return view('perangkat.index', compact('data', 'penduduk'));
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
        $nama = Penduduk::where('id', $request->id_penduduk)->first();
        $nama = $nama->nama;
        $store = Perangkat::create([
            'id_penduduk'   => $request->id_penduduk,
            'jabatan'       => $request->jabatan,
            'mulai_tugas'   => $request->mulai_tugas,
            'status'        => $request->status,
        ]);

        if($store){
            return redirect('perangkat')->with('success', 'Berhasil menambahkan '.$nama.' sebagai perangkat nagari!');
        }else{
            return redirect('perangkat')->with('error', 'Gagal menambahkan '.$nama.' sebagai perangkat nagari!');
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
        $nama = Penduduk::where('id', $request->id_penduduk)->first();
        $nama = $nama->nama;
        $update = Perangkat::where('id', $id)->update([
            'id_penduduk'   => $request->id_penduduk,
            'jabatan'       => $request->jabatan,
            'mulai_tugas'   => $request->mulai_tugas,
            'status'        => $request->status,
        ]);
        
        if($update){
            return redirect('perangkat')->with('success', 'Berhasil mengubah data '.$nama.' di perangkat nagari!');
        }else{
            return redirect('perangkat')->with('error', 'Gagal mengubah data '.$nama.' di perangkat nagari!');
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
        $data = Perangkat::join('penduduk', 'penduduk.id', '=', 'perangkat.id_penduduk')
            ->where('perangkat.id', $id)
            ->first();
        // dd($data);
        $delete = Perangkat::where('id', $id)->delete();

        if($delete){
            return redirect('perangkat')->with('success', "Berhasil menghapus data ".$data->nama." sebagai perangkat nagari !");
        }else{
            return redirect('perangkat')->with('error', "Gagal menghapus data!");
        }
    }
}
