<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama_projek',
        'deskripsi_projek',
        'tujuan_projek',
        'tanggal_dimulai',
        'tanggal_selesai',
        'hasil_projek',
        'file_name',
        'file_path',
        'user_id',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
