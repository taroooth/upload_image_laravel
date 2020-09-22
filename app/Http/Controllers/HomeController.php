<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $is_image = false;
        if (Storage::disk('local')->exists('public/images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('/index', ['is_image' => $is_image]);
    }

     /**
     * 画像の保存
     *
     * @param HomeRequest $request
     * @return Response
     */
    public function store(HomeRequest $request)
    {
        $request->photo->storeAs('public/images', Auth::id() . '.jpg');

        return redirect('home')->with('success', '新しい画像を保存しました');
    }

    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public');
            return view('index')->with('filename', basename($path));
        } else {
            return redirect()->back()->withInput();
        }
    }
}