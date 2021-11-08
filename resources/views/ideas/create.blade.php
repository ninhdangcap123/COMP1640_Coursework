@extends('layouts.header')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Ideas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
          integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
<h2>Create Idea</h2>
<form action="{{route('idea.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">
        Title:
        <input type="text" name="title">
    </label><br>
    <label for="content">
        Description:
        <input type="text" name="description">
    </label><br>
    <label for="Role">
        Post as:
        <select name="user_id" id="">
            <option value="{{auth()->user()->id}}">Yourself</option>

            <option value="5">Anonymous</option>
        </select>

    </label><br>
    <label for="category">
        Category:

        <select name="category_id" id="">
        @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
    </label><br>
    <label for="Document">
        Select file to upload:
        <input type="file" name="document">
    </label><br>
{{--    <div class="form-group">--}}
{{--        <label for="document">Document:</label>--}}
{{--        <div class="custom-file">--}}
{{--            <input type="file" name="document" class="custom-file-input" id="document">--}}
{{--            <label class="custom-file-label" for="document">Choose file</label>--}}
{{--        </div>--}}
{{--    </div>--}}

    <button type="submit">Create idea</button>

</form>
</body>
<script src="{{asset('js/custom.js')}}" defer></script>
<!-- Isotope File -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
</html>
@endsection
