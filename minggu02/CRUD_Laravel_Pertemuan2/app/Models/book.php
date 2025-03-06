<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    //array mementukkan atribut yg akan diisi
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'jumlah',
    ];
    
}
