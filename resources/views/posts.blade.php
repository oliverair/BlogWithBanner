@extends('layouts.default')

@section('content')
<div>
    <div>
        <h1>Posts</h1>
        @if(count($posts) === 0)
            <p>No posts</p>
        @else
        <ul style="list-style-type: upper-roman;">
            @foreach($posts as $post)
                @if ($loop->last)
                    @include('banners.banner', ['banner' => $post->getRandomBanner()])
                @endif

                <li><a href="{{ route('post', ['id' => $post->id]) }}">{{ $post->name }}</a> ({{ $post->created_at }})</li>

                @if ($loop->first)
                    @include('banners.banner', ['banner' => $post->getRandomBanner()])
                @endif
            @endforeach
        </ul>
        @endif
    </div>
</div>
@stop
