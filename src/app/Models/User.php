<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * ホワイトリストの設定
     * 「基本設計書」および「機能要件」に基づき、登録に必要な項目を指定
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * シリアライズ時に隠す属性
     * 仕様書にある password のみ指定（remember_token は仕様外のため削除）
     */
    protected $hidden = [
        'password',
    ];

    /**
     * リレーション：目標体重 (weight_targetテーブル)
     * ユーザー1人につき目標体重は1つ (1対1)
     */
    public function weightTarget()
    {
        return $this->hasOne(WeightTarget::class);
    }

    /**
     * リレーション：体重ログ (weight_logsテーブル)
     * ユーザー1人につき体重ログは複数 (1対多) [2]。
     */
    public function weightLogs()
    {
        return $this->hasMany(WeightLog::class);
    }
}