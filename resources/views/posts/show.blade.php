@extends('layouts.app')

@section('content')


    <div class="container">
        <h5>Author: {{$post->author}}</h5>
        <h3>{{ $post->title }}</h3>
        <img src="{{ $post->img_path }}" alt="">
        <div class="date">Published on {{ $post->created_at}}</div>
    </div>

@endsection
