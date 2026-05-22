<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    //管理画面一覧表示
    public function index()
    {
        //ログインユーザーの取得
        $user = Auth::user();

        //ログインユーザーの目標体重を取得
        $weightTarget = WeightTarget::where('user_id', $user->id)->first();

        //最新（現在）体重の取得
        $latestWeightLog = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->first();

        //目標まであと何㎏かの計算 最新体重から目標体重を引いた値を計算して、変数に代入
        $goalWeight = $weightTarget ? $weightTarget->target_weight : 0;
        $latestWeight = $latestWeightLog ? $latestWeightLog->weight : 0;
        $toGoal = $latestWeight - $goalWeight;

        //体重ログ一覧の取得（ページネーション ８件）３５件のデータがあるため、ここで８件ずつ分解して表示する
        $weightLogs = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->paginate(8);

        return view('weight_logs.index', compact(
            'weightLogs',
            'goalWeight',
            'toGoal',
            'latestWeight',
        ));
    }

    //体重登録画面（モーダル表示用）
    public function create()
    {
        //管理画面と同じデータが必要なため、indexメソッドと同様の処理を行う
        $user = Auth::user();
        $weightTarget = WeightTarget::where('user_id', $user->id)->first();

        //indexと同じビューを返しつつ『モーダルを開く』というフラグを渡す
        return view('weight_logs.index',[
        'openModal' => true,
        'defaultDate' => now()->format('Y-m-d'),
        'weightTarget' => $weightTarget,
        'goalWeight' => $weightTarget ? $weightTarget->target_weight : 0,

        ]);
    }

    //検索
    public function search(Request $request)
    {

        //ログインユーザーの取得
        $user = Auth::user();

        //ログインユーザーの目標体重を取得
        $weightTarget = WeightTarget::where('user_id', $user->id)->first();

        //最新（現在）体重の取得
        $latestWeightLog = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->first();

        //目標まであと何㎏かの計算 最新体重から目標体重を引いた値を計算して、変数に代入
        $goalWeight = $weightTarget ? $weightTarget->target_weight : 0;
        $latestWeight = $latestWeightLog ? $latestWeightLog->weight : 0;
        $toGoal = $latestWeight - $goalWeight;

        //期間指定(開始日～終了日)を受け取る
        $searchDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = WeightLog::where('user_id', $user->id);

        if ($searchDate && $endDate) {
            $query->whereBetween('date', [$searchDate, $endDate]);
        } elseif ($searchDate) {
            $query->where('date', $searchDate);
        }
        //ページネーション ８件
        $weightLogs = $query->orderBy('date', 'desc')->paginate(8);

        //検索結果をビューに渡す
        $count = $weightLogs->total();

        return view('weight_logs.index', compact('weightLogs', 'count', 'goalWeight', 'toGoal', 'latestWeight'));
    }

    //詳細画面表示
    public function detail($weightLogId)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($weightLogId);
        return view('weight_logs.detail', compact('weightLog'));
    }

    //更新
    //Todo：バリデーション実装後メソッド（FormRequest）編集
    public function update(Request $request, $weightLogId)
    {
        //ログインユーザーに紐づくデータのみを取得するように絞りこむ
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($weightLogId);
        $weightLog->update($request->all());
        return redirect()->route('weight_logs.index')->with('success', '体重ログが更新されました。');
    }

    //削除
    public function delete($weightLogId)
    {
        //同様にユーザーIDで絞り込んで取得することで、ログインユーザーに紐づくデータのみを削除できるようにする
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($weightLogId);
        $weightLog->delete();
        return redirect()->route('weight_logs.index');
    }

    //モーダルでの新規登録
    //Todo：バリデーション実装後メソッド（FormRequest）編集
    public function storeModal(Request $request)
    {
        $weightLog = new WeightLog();
        $weightLog->user_id = Auth::id();
        $weightLog->fill($request->all());
        $weightLog->save();
        return redirect()->route('weight_logs.index')->with('success', 'Weight Logが登録されました。');
    }
}
