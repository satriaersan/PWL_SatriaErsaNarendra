<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\database\Eloquent\Relation\HasOne;
// use Illuminate\database\Eloquent\Relation\HasMany;
// use Illuminate\database\Eloquent\Relation\BelongsTo;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
//One to one
// class userModel extends model{
//     public function level(): HasOne{
//         return $this->hasOne(LevelModel::class);
//     }
// }

//One to many
// class KategoriModel extends Model{
//     public function barang(): Hasmany{
//         return $this->hasMany(BarangModel::class, 'barang-id', 'barang-id');
//     }
// }

//One to many (Inverse)/Belongs to
// class BarangModel extends Model{
//     public function Kategori(): BelongsTo{
//         return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
//     }
// }
