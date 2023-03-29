<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweetId = (int) $request->route('tweetId'); // ルーティングファイルで引数に渡されてる値
        $tweet = Tweet::where('id', $tweetId)->firstOrFail(); // モデルからデータを取得
        $tweet->delete(); // Eloquetモデルを利用してデータを削除
        # Tweet::destroy($tweetId); // 直接主キーを指定して削除することも可能
        return redirect()->route('tweet.index')
                ->with('feedback.success',"つぶやきを削除しました"); // リダイレクト
    }
}
