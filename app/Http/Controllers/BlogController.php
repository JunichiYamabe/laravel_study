<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    //一覧画面表示
    public function index()
    {
        //ブログデータを全て取得する
        $blogs = Blogs::all();
        //取得したデータをビューに渡す
        return view('index', compact('blogs'));
    }

    //新規投稿画面を表示
    public function create()
    {
        return view('create');
    }

    //投稿データを保存
    public function store(BlogRequest $request)
    {
        //バリデーション
        $validatedData = $request->validatedData([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //ブログデータを保存
        Blogs::create($validatedData);

        //リダイレクト
        return redirect()->route('index')->with('success', 'ブログが投稿されました。');
    }
}
