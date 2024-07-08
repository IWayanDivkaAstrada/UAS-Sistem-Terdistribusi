<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis_id',
        'isbn',
        'tahun_terbit',
        'image',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }
}
