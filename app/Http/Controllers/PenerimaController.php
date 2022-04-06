<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaBantuan as Penerima;
use App\Models\Penduduk;
use App\Models\Bantuan;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bantuan = Bantuan::get();
        $penduduk = Penduduk::get();
        $data = Penerima::join('penduduk', 'penduduk.id', '=', 'penerima_bantuan.id_penduduk')
            ->join('bantuan', 'bantuan.id', '=', 'penerima_bantuan.id_bantuan')
            ->select('penerima_bantuan.id_penduduk', 'penerima_bantuan.id_bantuan', 'penerima_bantuan.id', 'penerima_bantuan.keterangan', 'penduduk.nama', 'bantuan.nama_bantuan')
            ->get();
        return view('penerima.index', compact('data', 'penduduk', 'bantuan'));
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
        $nama_bantuan = Bantuan::where('id', $request->id_bantuan)->first();
        $nama_bantuan = $nama_bantuan->nama_bantuan;
        // dd($nama, $nama_bantuan);
        $store = Penerima::create([
            'id_penduduk'   => $request->id_penduduk,
            'id_bantuan'    => $request->id_bantuan,
            'keterangan'    => $request->keterangan,
        ]);

        if($store){
            return redirect('penerima')->with('success', 'Berhasil menambahkan '.$nama.' sebagai penerima bantuan '.$nama_bantuan);
        }else{
            return redirect('penerima')->with('error', 'Gagal menambahkan '.$nama.' sebagai penerima bantuan '.$nama_bantuan);
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
        $nama = Penduduk::where('id', $request->id_penduduk)->first();
        $nama = $nama->nama;
        $nama_bantuan = Bantuan::where('id', $request->id_bantuan)->first();
        $nama_bantuan = $nama_bantuan->nama_bantuan;
        $update = Penerima::where('id', $id)->update([
            'id_penduduk'   => $request->id_penduduk,
            'id_bantuan'    => $request->id_bantuan,
            'keterangan'    => $request->keterangan,
        ]);
        
        if($update){
            return redirect('penerima')->with('success', 'Berhasil mengubah '.$nama.' sebagai penerima bantuan '.$nama_bantuan);
        }else{
            return redirect('penerima')->with('error', 'Gagal mengubah '.$nama.' sebagai penerima bantuan '.$nama_bantuan);
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
        $data = Penerima::join('penduduk', 'penduduk.id', '=', 'penerima_bantuan.id_penduduk')
            ->join('bantuan', 'bantuan.id', '=', 'penerima_bantuan.id_bantuan')
            ->select('penduduk.nama', 'bantuan.nama_bantuan')
            ->where('penerima_bantuan.id', $id)
            ->first();
        // dd($data);
        $delete = Penerima::where('id', $id)->delete();

        if($delete){
            return redirect('penerima')->with('success', "Berhasil menghapus data ".$data->nama." sebagai penerima bantuan ".$data->nama_bantuan." !");
        }else{
            return redirect('penerima')->with('error', "Gagal menghapus data!");
        }
    }
}
