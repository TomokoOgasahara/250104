<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function create()
    {
        return view('event_touroku'); // フォーム用のビュー
    }

    // * フォームからのPOSTデータを保存
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'event_title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'on_off' => 'nullable|string|max:255',
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'explanation' => 'nullable|string|max:255',
            'event_link' => 'nullable|string|max:255',                        
            'comp_name' => 'required|string|max:50',
        ]);

        // 画像を保存
        $imagePath = $request->file('event_image')->store('event_image', 'public');

        // データ登録
        DB::table('event')->insert([
            'event_title' => $request->input('event_title'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'on_off' => $request->input('on_off'),
            'event_image' => $imagePath,
            'explanation' => $request->input('explanation'),
            'event_link' => $request->input('event_link'),            
            'comp_name' => $request->input('comp_name'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 登録後のリダイレクト
        return redirect('event_touroku_kakunin')->with('success', '登録が完了しました！');
    }

    // イベント情報を取得（共通メソッド）
    private function getEvents()
    {
        return DB::table('event')->get();
    }

    // イベントページ表示用
    public function showEvents()
    {
        $events = $this->getEvents();

        // ビューにイベント情報を渡す
        return view('event', ['events' => $events]);
    }
    }