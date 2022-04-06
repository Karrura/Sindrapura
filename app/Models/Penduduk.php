<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $primaryKey = 'nik';
    protected $guarded = [];

    public function cekLog($nik, $password)
    {
    	$data = \DB::table('penduduk')->where('penduduk.nik', $nik)->first();
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
