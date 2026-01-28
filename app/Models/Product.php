<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tabel_produk';
    protected $primaryKey = 'id_produk';
    
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'berat',
        'min_beli',
        'jenis_kain',
        'motif_id',
        'etalase',
        'ukuran',
        'panjang_tali',
        'proses_batik',
        'stok',
        'gambar',
        'gambar_detail',
        'gambar_detail2',
        'kategori',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'berat' => 'decimal:2',
    ];

    // Relationship with Kategori
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori', 'id');
    }

    // Relationship with Motif
    public function motif()
    {
        return $this->belongsTo(Motif::class, 'motif_id', 'id');
    }

    // Helper method to get formatted price
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Helper method to get main image URL
    public function getGambarUrlAttribute()
    {
        if ($this->gambar && file_exists(public_path('images/products/' . $this->gambar))) {
            return asset('images/products/' . $this->gambar);
        }
        return asset('images/products/default.jpeg');
    }

    // Helper method to get detail images array
    public function getDetailImagesAttribute()
    {
        $images = [];
        
        // Main image
        $images[] = $this->gambar_url;
        
        // Detail images
        if ($this->gambar_detail) {
            $detailImages = explode(',', $this->gambar_detail);
            foreach ($detailImages as $image) {
                $image = trim($image);
                if ($image && file_exists(public_path('images/products/detail/' . $image))) {
                    $images[] = asset('images/products/detail/' . $image);
                }
            }
        }
        
        // Detail2 images
        if ($this->gambar_detail2) {
            $detail2Images = explode(',', $this->gambar_detail2);
            foreach ($detail2Images as $image) {
                $image = trim($image);
                if ($image && file_exists(public_path('images/products/detail2/' . $image))) {
                    $images[] = asset('images/products/detail2/' . $image);
                }
            }
        }
        
        return $images;
    }
}