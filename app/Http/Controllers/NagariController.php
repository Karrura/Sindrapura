<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nagari;
use App\Models\AdminPimpinan as AP;

class NagariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pimpinan = AP::join('penduduk', 'penduduk.id', '=', 'admin.id_penduduk')
                    ->select('penduduk.nama', 'penduduk.id as id_penduduk', 'admin.id')
                    ->get();
        $data = \DB::table('nagari as n')
                ->join('penduduk', 'penduduk.id', '=', 'n.id_pimpinan')
                ->select('penduduk.nama', 'penduduk.foto as foto_pimpinan', 'n.nagari', 'n.id_pimpinan', 'n.visi', 'n.misi', 'n.foto', 'n.logo', 'n.keterangan', 'n.email', 'n.telp', 'n.id', 'penduduk.tgl_lahir', 'penduduk.nohp', 'penduduk.alamat', 'penduduk.pendidikan')
                ->first();
        // dd($data);
        return view('nagari.profile', compact('data', 'pimpinan'));
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
        //
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
        $data = Nagari::first();
        $namafile = $data->foto;
        $icon = $data->logo;
        if($request->file('foto')){
            $namafile = null;
            $pict = $request->foto;
            $namafile = time().rand(100, 99).".".$pict->getClientOriginalName();
            $request->foto->move(public_path('nagari'), $namafile);
        }
        if($request->file('logo')){
            $icon = null;
            $pict = $request->logo;
            $icon = time().rand(100, 99).".".$pict->getClientOriginalName();
            $request->logo->move(public_path('nagari'), $icon);
        }
        // dd($request, $namafile, $icon);
        $update = Nagari::where('id', $id)->update([
            'nagari'        => $request->nagari,
            'id_pimpinan'   => $request->id_pimpinan,
            'visi'          => $request->visi,
            'misi'          => $request->misi,
            'foto'          => $namafile,
            'logo'          => $icon,
            'keterangan'    => $request->keterangan,
            'email'         => $request->email,
            'telp'          => $request->telp,
        ]);

        if($update){
            return redirect('profile')->with('success', "Berhasil mengubah profile nagari!");
        }else{
            return redirect('profile')->with('error', "Gagal mengubah profile nagari!");
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
