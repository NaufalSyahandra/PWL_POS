<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class m_levelModel extends Model
{
    use HasFactory;
    protected $table = "m_level";
    protected $primaryKey = "level_id";

    protected $fillable = ['level_kode', 'level_nama'];

    public function users(): HasMany
    {
        return $this->hasMany(m_userModel::class, 'level_id', 'level_id');
    }

    public function m_user(): HasMany
    {
        return $this->hasMany(m_user::class, 'level_id', 'level_id');
    }
}
