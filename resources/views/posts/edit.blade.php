@extends('layouts.app')

@section('content')

<div class="container">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="author">Author</label> <br>
            <input type="text" class="form-control" name="author" id="author" value="{{$post->author}}">
        </div>

        <div class="form-group">
            <label for="title">Title</label> <br>
            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
        </div>

        <div class="form-group">
            <label for="img_path">Img_path</label> <br>
            <input type="file" class="form-control" name="img_path" id="img_path" value="{{$post->img_path}}">
        </div>


        <button type="submit" class="btn btn-primary">Save</button>


    </form>

    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-danger">Go back!</button></a>

</div>

@endsection