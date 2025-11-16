<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    // WAJIB: Menentukan nama tabel yang dibuat oleh Django
    protected $table = 'product_catalog_promotion'; 

    protected $fillable = [
        'title', 'tagline', 'description', 'start_date', 'end_date', 'is_active'
    ];
    
    // Memberi tahu Laravel untuk memparsing field ini sebagai objek tanggal
    protected $dates = ['start_date', 'end_date'];

}