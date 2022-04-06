<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;
    protected $table = 'penerima_bantuan';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
