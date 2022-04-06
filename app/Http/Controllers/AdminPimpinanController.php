<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\AdminPimpinan as AP;

class AdminPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AP::join('penduduk', 'penduduk.id', '=', 'admin.id_penduduk')
                ->select('admin.id', 'penduduk.nama', 'admin.role', 'admin.id_penduduk')
                ->get();
        $penduduk = Penduduk::get();
        return view('admin_pimpinan.index', compact('data', 'penduduk'));
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
        $nama = Penduduk::where('id', $request->id_penduduk)->first();
        $nama = $nama->nama;
        // dd($nama, $nama_bantuan);
        $store = AP::create([
            'id_penduduk'   => $request->id_penduduk,
            // 'password'      => \Hash::make($request->password),
            'role'          => $request->role,
        ]);

        if($store){
            return redirect('admin')->with('success', 'Berhasil menambahkan data admin '.$nama);
        }else{
            return redirect('admin')->with('error', 'Gagal menambahkan data!');
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
        $data = AP::where('id', $id)->first();
        // if($request->password == null){
        //     $password = $data->password;
        // }else{
        //     $password = \Hash::make($request->password);
        // }
        // dd($password);
        $update = AP::where('id', $id)->update([
            'id_penduduk'   => $request->id_penduduk,
            // 'password'      => $password,
            'role'          => $request->role,
        ]);

        if($update){
            return redirect('admin')->with('success', 'Berhasil mengubah data admin '.$nama);
        }else{
            return redirect('admin')->with('error', 'Gagal mengubah data!');
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
        $data = AP::join('penduduk', 'penduduk.id', '=', 'admin.id_penduduk')
            ->where('admin.id', $id)
            ->first();
        // dd($data);
        $delete = AP::where('id', $id)->delete();

        if($delete){
            return redirect('admin')->with('success', "Berhasil menghapus data ".$data->nama);
        }else{
            return redirect('admin')->with('error', "Gagal menghapus data!");
        }
    }
}
