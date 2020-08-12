@extends('articlelayout')
@section('title')
    {{$data['title']}}
@stop
@section('push_time')
    {{$data['push_time']}}
@stop
@section('author')
    {{$data['author']}}
@stop
@section('read_num')
    {{$data['read_num']}}
@stop
@section('article')
    @include($data['article'])
@stop
@section('tag')
    @foreach($data['tag'] as $tag)
        <a class="label label-default">{{$tag}}</a>
    @endforeach
@stop
@section('page')
    @if(!empty($data['last_article']))
        <p class="last">上一篇：<a href="/article/{{$data['last_article']['id']}}">{{$data['last_article']['title']}}</a></p>
    @endif
    @if(!empty($data['next_article']))
        <p class="next">下一篇：<a href="/article/{{$data['next_article']['id']}}">{{$data['next_article']['title']}}</a></p>
    @endif
@stop
@section('right_article')
    @foreach($data['right_article'] as $key =>  $right_article)
        <li><a href="/article/{{$key}}">{{$right_article}}</a></li>
    @endforeach
@stop


