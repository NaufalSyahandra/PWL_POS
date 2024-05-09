<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Attribute;

class m_barangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';

    protected $guarded = [
        'barang_id'
    ];

    protected $fillable = ['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual', 'image_barang'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(m_kategoriModel::class, 'kategori_id', 'kategori_id');
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/img/' . $image),
        );
    }
}
