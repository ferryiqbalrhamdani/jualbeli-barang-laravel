<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'nama_kategory',
        'qty',
        'harga_jual',
        'harga_beli',
        'desc'
    ];
}
