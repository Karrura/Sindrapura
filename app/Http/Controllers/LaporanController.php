<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\PenerimaBantuan as Penerima;
use App\Models\Perangkat;
use PDF;

class LaporanController extends Controller
{
	// PENDUDUK
    public function laporanPenduduk()
    {
    	$data = Penduduk::get();
    	return view('laporan.penduduk', compact('data'));
    }
    public function cetakPenduduk()
    {
    	$data = Penduduk::get();
    	$pdf = PDF::loadview('laporan.pendudukPdf',compact('data'))
        ->setPaper('letter');
        return $pdf->stream('Laporan Penduduk Nagari');
    }

    // PENERIMA
    public function laporanPenerima()
    {
    	$data = Penerima::join('penduduk', 'penduduk.id', '=', 'penerima_bantuan.id_penduduk')
    			->join('bantuan', 'bantuan.id', '=', 'penerima_bantuan.id_bantuan')
    			->select('penduduk.nama', 'bantuan.nama_bantuan', 'penerima_bantuan.keterangan')
    			->get();
    	$id_bantuan = 0;
    	return view('laporan.penerima', compact('data', 'id_bantuan'));
    }
    public function searchPenerima(Request $request)
    {
    	if($request->id_bantuan == null){
    		return redirect('laporan-penerima');
    	}else{
    		$data = Penerima::join('penduduk', 'penduduk.id', '=', 'penerima_bantuan.id_penduduk')
    			->join('bantuan', 'bantuan.id', '=', 'penerima_bantuan.id_bantuan')
    			->select('penduduk.nama', 'bantuan.nama_bantuan', 'penerima_bantuan.keterangan')
    			->where('bantuan.id', $request->id_bantuan)
    			->get();
    		// dd($data);
    		$id_bantuan = $request->id_bantuan;
    		return view('laporan.penerima', compact('data', 'id_bantuan'));
    	}
    }
    public function cetakPenerima($id_bantuan)
    {
    	if($id_bantuan == 0){
    		$data = Penerima::join('penduduk', 'penduduk.id', '=', 'penerima_bantuan.id_penduduk')
    			->join('bantuan', 'bantuan.id', '=', 'penerima_bantuan.id_bantuan')
    			->select('penduduk.nama', 'bantuan.nama_bantuan', 'penerima_bantuan.keterangan')
    			->get();
		}else{
			$data = Penerima::join('penduduk', 'penduduk.id', '=', 'penerima_bantuan.id_penduduk')
			->join('bantuan', 'bantuan.id', '=', 'penerima_bantuan.id_bantuan')
			->select('penduduk.nama', 'bantuan.nama_bantuan', 'penerima_bantuan.keterangan')
			->where('bantuan.id', $id_bantuan)
			->get();
		}
		$pdf = PDF::loadview('laporan.penerimaPdf',compact('data'))
        ->setPaper('letter');
        return $pdf->stream('Laporan Penerima Bantuan');
    	// return view('laporan.penerimaPdf', compact('data'));
    }

    // PERANGKAT
    public function laporanPerangkat()
    {
    	$data = Perangkat::join('penduduk', 'penduduk.id', '=', 'perangkat.id_penduduk')->get();
    	return view('laporan.perangkat', compact('data'));
    }
    public function cetakPerangkat()
    {
    	$data = Perangkat::join('penduduk', 'penduduk.id', '=', 'perangkat.id_penduduk')->get();
    	$pdf = PDF::loadview('laporan.perangkatPdf',compact('data'))
        ->setPaper('letter');
        return $pdf->stream('Laporan Perangkat Nagari');
    }
}
