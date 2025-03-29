<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class LevelModel extends Model
{
    // use HasFactory;
    // public function user():BelongsTo{
    //     return $this->belongsTo(UserModel::class);
    // }
    // protected $table = 'm_level';   
    // protected $primaryKey = 'level_id';  

    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    protected $fillable = ['level_nama', 'level_kode'];

    public function user(): BelongsTo {

        return $this->belongsTo(UserModel::class);
    }
   
}
