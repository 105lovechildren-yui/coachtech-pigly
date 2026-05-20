<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class WeightTargetController extends Controller
{
    //初期目標設定
    public function create()
    {
        return view('weight_targets.create');
    }

    //目標設定画面
    public function goalSetting(): View
    {
        return view('weight_targets.edit');
    }
//画面確認用の仮データ
    public function detail($weightLogId = null)
    {
        $weightLog = (object)[
            'id' => 1,
            'weight' => 62.5,
            'target_weight' => 58.0,
            'date' => '2026-05-20',
            'memo' => '今日はちょい増えた…',
        ];

        return view('weight_logs.detail', compact('weightLog'));
    }
}
