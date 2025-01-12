<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecruitController extends Controller
{
    public function store(Request $request)
{
    // バリデーション
    $request->validate([
        'comp_name' => 'nullable|string|max:255',
        'job_title' => 'nullable|string|max:255',
        'speciality' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'keyword' => 'nullable|string|max:255',
        'features' => 'nullable|string|max:255',
        'employment_type' => 'nullable|string|max:255',
        'job_description' => 'nullable|string|max:5000',
        'qualifications' => 'nullable|string|max:5000',
        'compensation' => 'nullable|string|max:5000',
        'workplace_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'job_satisfaction' => 'nullable|string|max:5000',
        'remote_work' => 'nullable|string|max:255',
        'hiring_background' => 'nullable|string|max:5000',
        'url' => 'nullable|url|max:255',
    ]);

    // 画像を保存
    $imagePath = null;
    if ($request->hasFile('workplace_image')) {
        $imagePath = $request->file('workplace_image')->store('workplace_image', 'public');
    }

    try {
        // データ登録
        DB::table('recruit')->insert([
            'comp_name' => $request->input('comp_name'),
            'job_title' => $request->input('job_title'),
            'speciality' => $request->input('speciality'),
            'location' => $request->input('location'),
            'keyword' => $request->input('keyword'),
            'features' => $request->input('features'),
            'employment_type' => $request->input('employment_type'),
            'job_description' => $request->input('job_description'),
            'qualifications' => $request->input('qualifications'),
            'compensation' => $request->input('compensation'),
            'workplace_image' => $imagePath,
            'job_satisfaction' => $request->input('job_satisfaction'),
            'remote_work' => $request->input('remote_work'),
            'hiring_background' => $request->input('hiring_background'),
            'url' => $request->input('url'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // データ登録後の確認用メッセージ
        dd('データが登録されました', $request->all());

    } catch (\Exception $e) {
        // エラーメッセージを表示して処理を終了
        dd('エラーが発生しました: ' . $e->getMessage());
    }

    // 登録後のリダイレクト
    return redirect('recruit_touroku')->with('success', '登録が完了しました！');
}

    public function showRecruits()
{
    // すべてのリクルート情報を取得
    $recruits = DB::table('recruit')->get();

    // ビューにデータを渡す
    return view('recruit', ['recruits' => $recruits]);

}
}
