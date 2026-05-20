<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightLogController extends Controller
{
    //管理画面一覧表示
    public function index()
    {
        return view('weight_logs.index');
    }

    //体重登録画面
    public function create()
    {
        return view('weight_logs.create');
    }

    //検索
    public function search(Request $request)
    {
        $searchDate = $request->input('search_date');
    }

    //詳細画面表示
    public function detail()
    {
        return view('weight_logs.detail');
    }

    //更新

    //削除



}
