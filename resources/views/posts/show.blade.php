@extends('layouts.app')

@section('content')


    <div class="container show">
        <h5>Author: {{$post->author}}</h5>
        <h3>Title: {{ $post->title }}</h3>
        <img src="{{ $post->img_path }}" alt="">
        <div class="category">Categoria: {{ $post->category->name}}</div>
        <div class="date">Published on {{ $post->created_at}}</div>

        
        <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-danger">Go back!</button></a>
    </div>

@endsection
