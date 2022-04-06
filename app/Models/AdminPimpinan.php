<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPimpinan extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cekLog($nik, $password)
    {
    	$data = \DB::table('admin')->join('penduduk', 'penduduk.id', '=', 'admin.id_penduduk')
                ->where('penduduk.nik', $nik)->first();
    	// dd($data);
        if($data){
        	$acc = \Hash::check($password, $data->password);
        	if($acc){
        		return $data;
        	}else{
        		return false;
        	}
        }else{
        	return false;
        }
    }
}
