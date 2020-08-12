<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Image;
use App\Models\RotationShow;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $show_images = RotationShow::where('is_show','0')->orderBy('sort','DESC')->limit(4)->get();
        foreach ($show_images as $key => $value) {
            $images[] = $value->image;
        }
        $article = Article::where('is_top',0)->orderBy('created_at','DESC')->get()->toArray();
        foreach ($article as $key => $value) {
            $tag_ids = $value['tag_ids'];
            $tag = explode(',',$tag_ids);
            foreach ($tag as $value1) {
                $article[$key]['tag'][] = Tag::find($value1)->name;
            }
            unset($article[$key]['tag_ids']);
            $article[$key]['image'] = Image::find($value['image_id'])->url;
            $article[$key]['created_at'] = explode('UTC',date($value['created_at']))[0];
        }
        $right_tag = Tag::limit(10)->pluck('name','id');
        $right_article = Article::orderBy('created_at','desc')->limit(10)->pluck('title','id');
        return view('home/index')->with('show_images',$images)->with('article',$article)->with('right_article',$right_article)->with('right_tag',$right_tag);
    }
}
