<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Bantuan;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bantuan::get();
        return view('bantuan.index', compact('data'));
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
        $validator = Validator::make($request->all(), [
            'bantuan' => 'unique:bantuan,nama_bantuan',
        ], [
            'bantuan.unique:App\Models\Bantuan,nama_bantuan' => 'Bantuan telah digunakan !',
        ]);

        if ($validator->fails()) {
            return redirect('bantuan')->with('error', $validator->errors());
        } else {
            $insert = Bantuan::create([
                'nama_bantuan'      => $request->nama_bantuan,
                'kuota_penerima'    => $request->kuota_penerima,
                'keterangan'        => $request->keterangan,
            ]);

            if($insert){
                return redirect('bantuan')->with('success', "Berhasil menambahkan data ".$request->nama_bantuan);
            }else{
                return redirect('bantuan')->with('error', "Gagal menambahkan data!");
            }
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
        $data = Bantuan::where('id', $id)->first();
        $nama_bantuan = $data->nama_bantuan;
        $update = Bantuan::where('id', $id)->update([
            'nama_bantuan'      => $request->nama_bantuan,
            'kuota_penerima'    => $request->kuota_penerima,
            'keterangan'        => $request->keterangan,
        ]);

        if($update){
            return redirect('bantuan')->with('success', "Berhasil mengubah data ".$request->nama_bantuan);
        }else{
            return redirect('bantuan')->with('error', "Gagal mengubah data!");
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
        $nama_bantuan = Bantuan::where('id', $id)->first();
        $nama_bantuan = $nama_bantuan->nama_bantuan;
        $delete = Bantuan::where('id', $id)->delete();

        if($delete){
            return redirect('bantuan')->with('success', "Berhasil menghapus data ".$nama_bantuan);
        }else{
            return redirect('bantuan')->with('error', "Gagal menghapus data!");
        }
    }
}
