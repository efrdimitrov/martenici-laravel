@extends('base')

@section('title', 'Всички')

@section('menu')
    @include('layouts.menu')
@endsection

<div class="c-view-img c-view-img__{{ $size }}">
    <img src="{{'/images/'.$size.'/'.$article->code.'.'.$article->type}}" alt="">
    <div class="c-view-img__data">
        цена:{{ $article->price }}; {{ $article->info }} код:{{ $article->code }};
    </div>
</div>














