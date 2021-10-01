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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="author">Author</label> <br>
            <input type="text" class="form-control" name="author" id="author">
        </div>

        <div class="form-group">
            <label for="title">Title</label> <br>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="form-group">
            <label for="img_path">Img_path</label> <br>
            <input type="file" class="form-control" name="img_path" id="img_path">
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="category_id">Options</label>
                </div>
                <select class="custom-select" id="category_id" name="category_id">
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Save</button>


    </form>

    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-danger">Go back!</button></a>

</div>

@endsection