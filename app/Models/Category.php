<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tabel_kategori';
    
    protected $fillable = ['nama_kategori'];

    // Relationship with Produk
    public function produk()
    {
        return $this->hasMany(Product::class, 'kategori', 'id');
    }
}