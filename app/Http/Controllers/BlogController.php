<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
// use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // コンストラクタ
    public function __construct(private Blog $blog = new Blog,)
    {    }
    
    // マイページ画面表示
    public function mypage()
    {
        // ログインユーザーのIDを取得
        $userId = Auth::id();
        // ログインユーザーのブログデータを取得
        $blogs = $this->blog->getOwnBlog($userId);
        // 取得したデータをビューに渡す
        return view('mypage', compact('blogs'));
    }

    // ログインユーザーのブログを取得
    public function getOwnBlog($user_id)
    {
        // blogsテーブルのデータで$user_id(ログインユーザーID)とイコールのデータを取得
        $blogs = $this->where('user_id', $user_id)->get();
        // 取得したブログを返却
        return $blogs;
    }

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
    public function store(Request $request)
    {
        //バリデーション
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //画像がアップロードされた場合の処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        //ブログデータを保存
        Blogs::create($validatedData);

        //リダイレクト
        return redirect()->route('index')->with('success', 'ブログが投稿されました。');
    }

    //詳細画面を表示
    public function show($id)
    {
        //指定されたIDのブログデータを取得
        $blog = Blogs::findOrFail($id);
        //取得したデータをビューに渡す
        return view('detail', compact('blog'));
    }   


    // 更新画面を表示
    public function edit($id)
    {
        $blog = Blogs::findOrFail($id);
        return view('edit', compact('blog'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Blogs::findOrFail($id);
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];

        // 画像がアップロードされた場合の処理
        if ($request->hasFile('image')) {
            // 古い画像を削除
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }
            // 画像を保存
            $imagePath = $request->file('image')->store('images', 'public');
            $blog->image = $imagePath;
        }

        $blog->save();

        // リダイレクト
        return redirect()->route('detail', $id)->with('success', 'ブログが更新されました。');
    }

    public function search(Request $request)
    {
        $query = Blogs::query();
        // タイトルの入力欄に入力された値を変数に代入
        $titleSearch = $request->input('title');
        // 日付の入力欄に入力された値を代入
        $dateSearch = $request->input('created_at');

        // タイトルの入力欄に値が入力されている場合
        if ($request->filled('title')) {
            // 部分一致条件追加して検索
            $query->where('title', 'like', '%' . $titleSearch . '%');
        }

        // 日付の入力欄に値が入力されている場合
        if ($request->filled('created_at')) {
            // 一致条件追加して検索
            $query->whereDate('created_at', $dateSearch);
        }  

        $blogs = $query->get();
        return view('index', compact('blogs'));
    }

    public function destroy($id)
    {
        $blog = Blogs::findOrFail($id);
        $blog->delete();

        return redirect()->route('index')->with('success', '記事が削除されました。');
    }
}  

