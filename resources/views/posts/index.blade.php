@extends('layouts.app')

@section('content')


    <div class="container">
        <a href="{{route('posts.create')}}"><i class="bi bi-lightbulb"></i> Add Post!</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
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
                        <td>
                            <a href="{{ route('posts.show', $post)}}">
                                <button type="button" class="btn btn-primary"><i class="bi bi-zoom-in"></i></button>                                
                            </a>
                            <a href="{{ route('posts.edit', $post)}}">
                                <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>                               
                            </a>
                            <!-- <a href="{{ route('posts.destroy', $post)}}"><i class="bi bi-trash"></i></a> -->
                            <form action="{{route('posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>                   
                @endforeach

            </tbody>
        </table>
    </div>


@endsection