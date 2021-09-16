@extends('layouts.app')

@section('content')


    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Details</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($allPosts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td><img src="{{ $post->img_path }}" alt="cover of {{ $post->title }}"></td>
                        <td><a href="{{ route('posts.show', $post)}}"><i class="bi bi-zoom-in"></i></a></td>
                    </tr>                   
                @endforeach

            </tbody>
        </table>
    </div>


@endsection