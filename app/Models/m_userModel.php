<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as UserAuthenticate;
use PhpParser\Node\Attribute;
use Tymon\JWTAuth\Contracts\JWTSubject;

class m_userModel extends UserAuthenticate implements JWTSubject
{
    use HasFactory;

    protected $table = 'm_user'; //to define the name of the table used
    protected $primaryKey = 'user_id'; //to define the primary key of the table used


    protected $fillable = ['level_id', 'username', 'nama', 'password', 'image'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(m_levelModel::class, 'level_id', 'level_id');
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
