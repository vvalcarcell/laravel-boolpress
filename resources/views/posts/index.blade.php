@extends('layouts.app')

@section('content')


<div class="container">

    <a href="{{route('posts.create')}}"><i class="bi bi-lightbulb"></i> Add Post!</a>
    {{$dateNow->format('d-m-Y')}}
    @if($isWeekendFlag)
    It's the weekend!
    @else
    It's a work day :(
    @endif
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
                <td>{{ $post->created_at->format('d-m-Y H:i') }}</td>
                <td><img src="{{ $post->img_path }}" alt="cover of {{ $post->title }}"></td>
                <td>
                    <a href="{{ route('posts.show', $post)}}">
                        <button type="button" class="btn btn-primary"><i class="bi bi-zoom-in"></i></button>
                    </a>
                    <a href="{{ route('posts.edit', $post)}}">
                        <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                    </a>
                    <!-- <form action="{{route('posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form> -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$post->id}}"><i class="bi bi-trash"></i></button>

                    <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">WARNING!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    The post will be deleted. <br>
                                    Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection