<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Libraries\Markdown\Markdown;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    protected  $markdown;
    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }


    public function index($id) {
        $article = Article::find($id);
        //增加浏览次数
        //判断当前请求是否已登录
        $is_login = Tools::is_login();
        if(!$is_login) {
            //游客直接从文章详情页进 一般常见于网页分享
            //给游客分配uid 生成随机唯一的uid
            $uid = Tools::get_random_uid(0);
            Cookie::queue('uid',$uid,60);
            $is_login['uid'] = explode('_',$uid)[1];
        }
        //从redis获取当前用户是否在浏览过该文章 1小时
        if(!Redis::exists('article_'.$id.'_user_' .$is_login['uid'])){
            $article->increment('read_num');
            Redis::setex('article_'.$id.'_user_' .$is_login['uid'],3600,'');
        };

        $tag = explode(',',$article->tag_ids);
        $last_article = Article::where('id','<',$id)->orderBy('id','desc')->first();
        if($last_article) {
            $last = [
                'id' => $last_article->id,
                'title' => $last_article->title
            ];
        }else{
            $last = [];
        }
        $next_article = Article::where('id','>',$id)->first();
        if($next_article) {
            $next = [
                'id' => $next_article->id,
                'title' => $next_article->title
            ];
        }else{
            $next = [];
        }
        foreach ($tag as $value) {
            $tagdata[] = Tag::find($value)->name;
        }
        $right_article = Article::orderBy('created_at','desc')->limit(10)->pluck('title','id');
        $article_content = file_get_contents(env("APP_URL").'/'.$article->content->url);
        $article_content = $this->markdown->markdown($article_content);
        $article_content = htmlspecialchars_decode($article_content);
        $data = [
            'title' => $article->title,
            'push_time' => $article->created_at->format('Y-m-d H:i:s'),
            'author' => $article->author,
            'read_num' => $article->read_num,
            'article' => $article_content,
            'tag' => $tagdata,
            'last_article' => $last,
            'next_article' => $next,
            'right_article' => $right_article
        ];
        return view('home/article')->with('data',$data);
    }
}
