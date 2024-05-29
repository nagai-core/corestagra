<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function comments(){
        /* player テーブルに設定した team_id で関連付けする
        * $this->hasMany(<連携先クラス名>::class)
        */
        return $this->hasMany(Comment::class);
    }

}
