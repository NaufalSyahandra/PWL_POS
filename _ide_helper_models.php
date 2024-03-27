<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $barang_id
 * @property int $kategori_id
 * @property string $barang_kode
 * @property string $barang_nama
 * @property int $harga_beli
 * @property int $harga_jual
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereBarangKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereBarangNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereHargaBeli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereHargaJual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_barangModel whereUpdatedAt($value)
 */
	class m_barangModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $kategori_id
 * @property string $kategori_kode
 * @property string $kategori_nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\m_barangModel> $barang
 * @property-read int|null $barang_count
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel whereKategoriKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel whereKategoriNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_kategoriModel whereUpdatedAt($value)
 */
	class m_kategoriModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $level_id
 * @property string $level_kode
 * @property string $level_nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\m_user> $m_user
 * @property-read int|null $m_user_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\m_userModel> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel whereLevelKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel whereLevelNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_levelModel whereUpdatedAt($value)
 */
	class m_levelModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property int|null $level_id
 * @property string $username
 * @property string $nama
 * @property string $password
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\m_levelModel|null $level
 * @method static \Illuminate\Database\Eloquent\Builder|m_user newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_user newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_user query()
 * @method static \Illuminate\Database\Eloquent\Builder|m_user whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_user whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_user whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_user wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_user whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_user whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_user whereUsername($value)
 */
	class m_user extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property int $level_id
 * @property string $username
 * @property string $nama
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\m_levelModel $level
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|m_userModel whereUsername($value)
 */
	class m_userModel extends \Eloquent {}
}

