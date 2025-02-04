<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'judul', 'jumlah', 'status', 'cover', 'deskripsi', 'publish_date'];

    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
