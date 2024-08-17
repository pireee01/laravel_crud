<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrediksiNama extends Model
{
    use HasFactory;
    protected $table = 'prediksi_namas';
    protected $fillable = [
        'id_admin',
        'nama',
        'negara_1',
        'negara_2',
        'negara_3',
        'negara_4',
    ];

    // Relationship to User Model
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}