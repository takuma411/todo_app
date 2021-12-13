<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// バリデーション
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;
        //ユーザに紐づけて保存
        // インスタンスの状態をデータベースに書き込む
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index',[
            'id' => $folder->id,
        ]);
    }
}
