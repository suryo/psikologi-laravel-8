<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiu extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model dalam bentuk jamak
    protected $table = 'tiu';

    // Tentukan field yang bisa diisi secara massal
    protected $fillable = [
        'no_pendaftaran',
        'jwb1', 'jwb2', 'jwb3', 'jwb4', 'jwb5',
        'jwb6', 'jwb7', 'jwb8', 'jwb9', 'jwb10',
        'jwb11', 'jwb12', 'jwb13', 'jwb14', 'jwb15',
        'jwb16', 'jwb17', 'jwb18', 'jwb19', 'jwb20',
        'jwb21', 'jwb22', 'jwb23', 'jwb24', 'jwb25',
        'jwb26', 'jwb27', 'jwb28', 'jwb29', 'jwb30'
    ];

    // Jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = true;
}
