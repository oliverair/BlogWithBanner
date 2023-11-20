@extends('layouts.default')

@section('content')
<div>
    <a href="{{ url()->previous() }}">Back</a>
    <div>
        <h1>{{$post->name}}</h1>

        <div>
            {{ $post->text }}
        </div>
        <p>
            <i> {{ $post->created_at }}</i>
        </p>
    </div>
</div>
@stop
