<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama', 'email', 'password','alamat','no_telfon','username','akses'
    ];

}
