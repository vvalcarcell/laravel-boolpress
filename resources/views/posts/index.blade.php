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
            </tr>
            </thead>

            <tbody>

                @foreach ($allPosts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->date }}</td>
                        <td><img src="{{ $post->img_path }}" alt="cover of {{ $post->title }}"></td>
                    </tr>                   
                @endforeach

            </tbody>
        </table>
    </div>


@endsection