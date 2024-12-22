<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // 必要な名前空間をインポート
use App\Models\CompsDatabase;

class CompsDatabaseController extends Controller
{
    public function index(Request $request)
    {
        $companies = CompsDatabase::select('comp_name')->distinct()->get();

        $selectedCompany = null;
        if ($request->has('comp_name')) {
            $selectedCompany = CompsDatabase::where('comp_name', $request->input('comp_name'))->first();
        }

        return view('comps_database', compact('companies', 'selectedCompany'));
    }
}
