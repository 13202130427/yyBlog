<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id) {
        $article = Article::find($id);
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
        $data = [
            'title' => $article->title,
            'push_time' => $article->created_at->format('Y-m-d H:i:s'),
            'author' => $article->author,
            'read_num' => $article->read_num,
            'article' => $article->content->url,
            'tag' => $tagdata,
            'last_article' => $last,
            'next_article' => $next,
            'right_article' => $right_article
        ];
       return view('home/article')->with('data',$data);
    }
}
