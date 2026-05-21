<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory;

    /**
     * 1. テーブル名の指定
     * ソースの「テーブル仕様書」No.2に基づき、単数形のテーブル名を使用
     */
    protected $table = 'weight_target';

    /**
     * 2. ホワイトリストの設定
     * ユーザーIDと目標体重を保存できるように設定
     * 「基本設計書」にて目標体重は4桁の数値（小数点1桁）を定義
     */
    protected $fillable = [
        'user_id',
        'target_weight',
    ];

    /**
     * 3. リレーションの設定
     * 「テーブル仕様書」でuser_idがFOREIGN KEY（外部キー）となっているため、
     * Userモデルに従属する関係を定義
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
