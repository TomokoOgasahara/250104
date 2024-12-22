<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Icon; // モデルが必要な場合のみ残す

class IconController extends Controller
{
     /**
     *
     * Iconデータ一覧を表示
     *
     */
    public function index()
    {
        // textテーブルからすべてのデータを取得
        $texts = DB::table('text')->get();
    
        // データをビューに渡す
        return view('insert', ['texts' => $texts]);
    }
    
    /**
     * フォーム画面を表示
     */
    // public function create()
    // {
    //     return view('insert'); // 必要に応じてビュー名を変更
    // }

    /**
     * フォームからのPOSTデータを保存
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'text' => 'required|string|max:65535', // contentはフォームで指定されたname属性
        ]);

        // データ登録
        DB::table('text')->insert([
            'text' => $validated['text'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    

        // リダイレクト
        return redirect('insert');
     }
     
     /*
     * update関数はこちら
     */
    public function update(Request $request, $id){
  

        // バリデーション
        $validated = $request->validate([
            'text' => 'required|string|max:65535', // contentはフォームで指定されたname属性
        ]);

        // データ登録
        DB::table('text')->where('id', $id)->update([
            'text' => $validated['text'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // リダイレクトして一覧を表示
        return redirect('insert')->with('success', 'データが更新されました！');

    }

    /*
     * destroy関数はこちら
     */
    public function destroy(Request $request, $id){

        // データ登録
        DB::table('text')->where('id', $id)->delete();

        // リダイレクトして一覧を表示
        return redirect('insert')->with('success', 'データが削除されました！');

    }
}
