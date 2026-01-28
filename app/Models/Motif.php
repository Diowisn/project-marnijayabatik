<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;

    protected $table = 'tabel_motif';
    
    protected $fillable = ['nama_motif'];

    // Relationship with Produk
    public function produk()
    {
        return $this->hasMany(Product::class, 'motif_id', 'id');
    }
}