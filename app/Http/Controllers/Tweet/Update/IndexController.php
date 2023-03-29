<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        # ルーティングファイル（web.php）で{tweetId}としているものが取得出来る）
        $tweetId = (int) $request->route('tweetId');
        # クエリビルダ：first()で1件のみを返却する
        //$tweet = Tweet::where('id',$tweetId)->first();
        # クエリビルダ：firstOrFail()で例外処理を省略することが出来る。
        $tweet = Tweet::where('id',$tweetId)->firstOrFail();
        //if(is_null($tweet)){
        //    throw new NotFoundHttpException('存在しないつぶやきです');
        //}
        //dd($tweet);
        # tweer.updateの部分はviews配下のファイル名（ブレードファイルを指す）
        # withは引数を渡す事が出来る
        return view('tweet.update')->with('tweet',$tweet);
    }
}
