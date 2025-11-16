<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // WAJIB: Memberi tahu Laravel nama tabel yang benar
    protected $table = 'product_catalog_product'; 

    // PERBAIKAN UTAMA: Menonaktifkan fitur timestamps otomatis (created_at dan updated_at)
    // Karena tabel Supabase Anda (dari Django) tidak memiliki kolom updated_at.
    public $timestamps = false; 

    // Field yang boleh diisi
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'category', 
        'image_url', 
        'is_new_arrival', 
        'tag'
    ];
    
    // Type Casting
    protected $casts = [
        'is_new_arrival' => 'boolean',
        'price' => 'decimal:0',
    ];
}