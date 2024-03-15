<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_barangModel extends Model
{
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';



//    public function kategori(): BelongsTo
//    {
//        return $this->belongsTo(m_kategoriModel::class, 'kategori_id', 'kategori_id');
//    }
}
