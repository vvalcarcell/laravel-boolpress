@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Home è la nostra parte pubblica -->

    <div class="row">

        @foreach($posts as $post)
        <div class="card col-md-3" style="width: 18rem;">
            <img class="card-img-top" src="{{ $post->img_path }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->author }}</p>
                <p class="card-text">{{ $post->category->name }}</p>
                <p class="card-text"><strong>{{ $post->created_at }}</strong></p>

                @if(Auth::check())
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-success">Edit</a>
                @endif

            </div>
        </div>
        @endforeach

    </div>


</div>
@endsection