<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserPasswordController extends Controller
{
    
    // * フォームからのPOSTデータを保存

public function store(Request $request)
{
   // バリデーション
   $request->validate([
    'email' => 'required|email|max:255',
    'password' => 'required|min:8|max:255', // 最低8文字、最大255文字
]);

   // データ登録
   DB::table('userpassword')->insert([
       'email' => $request->email,
       'password' => Hash::make($request->password), // パスワードをハッシュ化
       'created_at' => now(),
       'updated_at' => now(),
   ]);


   // リダイレクト
   return redirect('/user_pass_kaku')->with('success', '登録が完了しました！');
}
}