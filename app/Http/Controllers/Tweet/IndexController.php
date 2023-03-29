<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
//use App\Models\Tweet;
use App\Service\TweetService; // TweetServiceのインポート
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //return view('tweet.index',['name' => 'lalabel']);
        //$tweets = Tweet::all(); // 全件取得するメソッド
        //$tweets = Tweet::orderBy('created_at','DESC')->get(); // ソート指定（SQLソート）
        //$tweets = Tweet::all()->sortByDesc('created_at'); // ソート指定（これでも出来るがPHPソート）
        //dd($tweets); // dump
        //return view('tweet.index')->with('name','lalabel')
        //                        ->with('version','8');

        # ↓ここでインスタンス化しなくても、サービスコンテナの機能によってエラーにならず処理出来る。
        //$tweetService = new TweetService(); // インスタンス化
        $tweets = $tweetService->getTweets(); // メソッド呼び出し
        return view('tweet.index')
                ->with('tweets',$tweets);
    }
}
