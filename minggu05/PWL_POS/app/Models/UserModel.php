<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';    //mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'user_id';  //mendefinisikan primary key dari tabel yang digunakan

   
    protected $fillable = ['username', 'nama', 'password', 'level_id'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
