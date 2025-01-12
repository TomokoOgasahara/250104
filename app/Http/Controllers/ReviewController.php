<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function create()
    {
        return view('review_touroku'); // フォーム用のビュー
    }

    // * フォームからのPOSTデータを保存
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required|string|max:50',
            'comp_name' => 'required|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'employment_status' => 'required|string|max:50',
            'age_group' => 'required|string|max:50',
            'employment_type' => 'required|string|max:50',
            'growth_potential' => 'required|integer|between:1,5',
            'job_satisfaction' => 'required|integer|between:1,5',
            'organizational_climate' => 'required|integer|between:1,5',
            'social_contribution' => 'required|integer|between:1,5',
            'salary' => 'required|integer|between:1,5',
            'benefits' => 'required|integer|between:1,5',
            'female_advancement' => 'required|integer|between:1,5',
            'reviews' => 'nullable|string|max:500',
        ]);

        // データ登録
        DB::table('review')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'comp_name' => $request->input('comp_name'),
            'speciality' => $request->input('speciality'),
            'employment_status' => $request->input('employment_status'),
            'years_of_service' => $request->input('years_of_service'),            
            'age_group' => $request->input('age_group'),
            'employment_type' => $request->input('employment_type'),
            'growth_potential' => $request->input('growth_potential'),
            'job_satisfaction' => $request->input('job_satisfaction'),
            'organizational_climate' => $request->input('organizational_climate'),
            'social_contribution' => $request->input('social_contribution'),
            'salary' => $request->input('salary'),
            'benefits' => $request->input('benefits'),
            'female_advancement' => $request->input('female_advancement'),
            'reviews' => $request->input('reviews'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 登録後のリダイレクト
        return redirect('review_touroku_kakunin')->with('success', '登録が完了しました！');
    }

    public function showReview(Request $request)
    {
        // Reviewテーブルからすべての企業名を取得（重複を除く）
        $companies = DB::table('review')
            ->select('comp_name')
            ->distinct()
            ->get();

        // 選択された企業のクチコミを取得
        $review = [];
        if ($request->has('comp_name')) {
            $review = DB::table('review')
                ->where('comp_name', $request->input('comp_name'))
                ->get(); // 複数データを取得
        }

        // データをビューに渡す
        return view('review', [
            'companies' => $companies, // 企業リストをビューに渡す
            'comp_name' => $request->input('comp_name'),
            'review' => $review, // 複数データ
        ]);
    }
}