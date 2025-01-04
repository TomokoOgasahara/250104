<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Requestクラスのインポート
use Illuminate\Support\Facades\DB; // DBクラスのインポート
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class UserController extends Controller
{
    /**
     *
     * Userデータ一覧を表示
     *
     */
    public function index()
    {
    
	    // userdatabaseテーブルからすべてのデータを取得
        $texts = DB::table('userdatabase')->get();
    
        // データをビューに渡す
        return view('user_touroku', ['texts' => $texts]);
    }

// * フォームからのPOSTデータを保存
public function store(Request $request)
{
   // バリデーション
   $request->validate([
    'name' => 'required|string|max:255',
    'name_kana' => 'required|string|max:255',
    'email' => 'required|email|max:255',
]);

   // データ登録
   DB::table('userdatabase')->insert([
       'name' => $request->name,
       'name_kana' => $request->name_kana,
       'email' => $request->email,
       'pref' => $request->pref,
       'job' => $request->job,
       'comp_univ' => $request->comp_univ,
       'dep' => $request->dep,
       'birth' => $request->birth,
       'created_at' => now(),
       'updated_at' => now(),
   ]);

   // ユーザ登録
   $user = User::create([
    'name' => $request->input('name'),
    'name_kana' => $request->input('name_kana'),
    'email' => $request->input('email'),
    'pref' => $request->input('pref'),
    'job' => $request->input('job'),
    'comp_univ' => $request->input('comp_univ'),
    'dep' => $request->input('dep'),
    'birth' => $request->input('birth'),
]);

    // パスワード登録リンク
    $link = url('/user_pass?email=' . urlencode($user->email));

    // メール送信
    Mail::raw("以下のリンクからパスワードを設定してください。\n$link", function ($message) use ($user) {
        $message->from('womtech1216@gmail.com', 'WomTech')
                ->to($user->email)
                ->subject('パスワード設定のご案内');
    });

   // リダイレクト
   return redirect('user_tou_kaku')->with('success', '登録が完了しました！');
}
}