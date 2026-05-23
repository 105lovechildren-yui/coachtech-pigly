<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Models\User;


class WeightTargetController extends Controller
{
    //会員登録の初期体重登録画面
    public function step2(): View
    {
        return view('auth.register_step2');
    }

    //初期体重登録の保存
    //Todoコメント：バリデーション実装後メソッド編集
    public function storeStep2(Request $request)
    {
        $user = User::create([
            'name' => session('name'),
            'email' => session('email'),
            'password' => bcrypt(session('password')),
        ]);

        Auth::login($user);

        //目標体重の保存
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->input('target_weight'),
        ]);

        //現在の体重の保存
        WeightLog::create([
            'user_id' => $user->id,
            'weight' => $request->input('current_weight'),
            'date' => now()->format('Y-m-d'),
        ]);

        //管理画面へ遷移
        return redirect()->route('weight_logs.index')->with('success', 'アカウントが作成されました');
    }

    //目標体重設定画面
    public function goalSetting(): View
    {
        $user = Auth::user();
        $weightTarget = WeightTarget::where('user_id', $user->id)->first();

        return view('weight_logs.goal_setting', compact('weightTarget'));
    }

    //目標体重の更新
    //Todoコメント：バリデーション実装後FormRequestに差し替え
    public function updateGoal(Request $request)
    {
        $user = Auth::user();
        //目標体重の更新なければ作成
        WeightTarget::updateOrCreate(
            ['user_id' => $user->id],
            ['target_weight' => $request->input('target_weight')]
        );
        //管理画面へ遷移
        return redirect()->route('weight_logs.index')->with('success', '目標体重が更新されました');
    }
}
