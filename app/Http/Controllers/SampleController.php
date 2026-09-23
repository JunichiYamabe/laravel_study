<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    public function showSample()
    {
        //サンプルデータを全て取得する
        $samples = Sample::all();
        //取得したデータをビューに渡す
        return view('sample', compact('samples'));
    }
}
