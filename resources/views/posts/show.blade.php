<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <div>
            @if($post->is_liked_by_auth_user())
            <a href="/posts/unlike/{{ $post->id }}]" class="btn btn-success btn-sm">いいね解除<span class="badge">{{ $post->likes->count() }}</span></a>
            {{ $post->likes->count() }}
            @else
            <a href="/posts/like/{{ $post->id }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
            {{ $post->likes->count() }}
            @endif
        </div>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            @if($post->move_url)
            <div>
                <video autoplay playsinline controls src="{{ $post->move_url }}" alt="画像が読み込めない。"></video>
            </div>
            @endif
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>