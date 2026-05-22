<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;
    /*
     * 1. ホワイトリストの設定
     * ユーザーIDと体重ログの各項目を保存できるように設定
     */
    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content',
    ];

    /**
     * 2. リレーションの設定
     * 「テーブル仕様書」でuser_idがFOREIGN KEY（外部キー）となっているため、
     * Userモデルに従属する関係を定義
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}