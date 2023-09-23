<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $guarded = [];

    public function kategoriFK(): BelongsTo
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id_kategori');
    }

    public function statusFK(): BelongsTo
    {
        return $this->belongsTo(status::class, 'status_id', 'id_status');
    }
}
