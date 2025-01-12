<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; // Controllerをインポート

class CompsDatabaseController extends Controller
{
    public function showCompanies(Request $request)
    {
        // 企業一覧を取得
        $companies = DB::table('compsdatabase')->select('comp_name')->distinct()->get();

        // 初期化
        $selectedCompany = null;
        $womensData = null;
        $womensDataArray = [];
        $tenureDataArray = [];
        $wageGapDataArray = [];
        $averageScores = [];
        $rankingData = [
            'turnover_rate_rank' => 'データなし',
            'avg_tenure_rank' => 'データなし',
            'wage_gap_rank' => 'データなし'
        ];
        $aiData = [];
        $sonotaData = [
            'avg_overtime_hours' => 'データなし',
            'paid_leave_usage_rate' => 'データなし',
        ];

        if ($request->has('comp_name')) {
            $compName = $request->input('comp_name');

            // 選択された企業の基本情報を取得
            $selectedCompany = DB::table('compsdatabase')
                ->where('comp_name', $compName)
                ->first();

            // womensdatabaseから関連データを取得
            $womensData = DB::table('womensdatabase')
                ->where('comp_name', $compName)
                ->first();

            if ($womensData) {
                // 女性比率データ
                $womensDataArray = [
                    $womensData->female_worker_ratio ?? 0,
                    $womensData->female_supervisor_ratio ?? 0,
                    $womensData->female_manager_ratio ?? 0,
                    $womensData->female_executive_ratio ?? 0,
                ];

                // 勤続年数データ
                $tenureDataArray = [
                    $womensData->avg_tenure_men ?? 0,
                    $womensData->avg_tenure_women ?? 0,
                ];

                // 賃金差データ
                $wageGapDataArray = [
                    $womensData->wage_gap_by_men ?? 0,
                    $womensData->wage_gap_by_gender ?? 0,
                ];

                // ランキングデータ
                $rankingData = [
                    'turnover_rate_rank' => $womensData->turnover_rate_rank ?? 'データなし',
                    'avg_tenure_rank' => $womensData->avg_tenure_rank ?? 'データなし',
                    'wage_gap_rank' => $womensData->wage_gap_rank ?? 'データなし',
                ];

                // AIコメントデータ
                $aiData = [
                    'good_point' => $womensData->good_point ?? 'データなし',
                    'bad_point' => $womensData->bad_point ?? 'データなし',
                ];

                // その他数値データ
                $sonotaData = [
                    'avg_overtime_hours' => $womensData->avg_overtime_hours ?? 'データなし',
                    'paid_leave_usage_rate' => $womensData->paid_leave_usage_rate ?? 'データなし',
                ];

            }

            // reviewテーブルから選択された企業の口コミ評価を取得
            $scores = DB::table('review')
                ->where('comp_name', $compName)
                ->selectRaw('
                    AVG(growth_potential) as growth,
                    AVG(job_satisfaction) as motivation,
                    AVG(organizational_climate) as culture,
                    AVG(social_contribution) as social_contribution,
                    AVG(salary) as salary,
                    AVG(benefits) as benefits,
                    AVG(female_advancement) as female_empowerment
                ')
                ->first();

            if ($scores) {
                $averageScores = [
                    $scores->growth ?? 0,
                    $scores->motivation ?? 0,
                    $scores->culture ?? 0,
                    $scores->social_contribution ?? 0,
                    $scores->salary ?? 0,
                    $scores->benefits ?? 0,
                    $scores->female_empowerment ?? 0,
                ];
            }

            // reviewテーブルから最新のクチコミを取得
            $Review = DB::table('review')
                ->where('comp_name', $compName)
                ->orderBy('created_at', 'desc')
                ->first();
        }

        // ビューにデータを渡す
        return view('comps_database', [
            'companies' => $companies,
            'selectedCompany' => $selectedCompany ?? null, // 確実に渡す
            'averageScores' => $averageScores,
            'womensDataArray' => $womensDataArray,
            'tenureDataArray' => $tenureDataArray,
            'wageGapDataArray' => $wageGapDataArray,
            'rankingData' => $rankingData, // ランキングデータを追加
            'aiData' => $aiData, // AIデータを追加 
            'sonotaData' => $sonotaData, // その他データを追加            
        ]);
    }
}
