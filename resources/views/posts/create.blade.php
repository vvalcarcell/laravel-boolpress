@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ route('posts.store') }}" method="POST">
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
                <input type="text" class="form-control" name="img_path" id="img_path">
            </div>


            <button type="submit" class="btn btn-primary">Save</button>


        </form>
    </div>

@endsection