<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Requestクラスのインポート
use Illuminate\Support\Facades\DB; // DBクラスのインポート

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
// */
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


   // リダイレクト
   return redirect('user_tou_kaku')->with('success', '登録が完了しました！');
}
}