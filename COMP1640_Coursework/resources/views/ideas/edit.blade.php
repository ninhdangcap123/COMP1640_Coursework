@extends('layouts.header')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Update Idea</h2>
<form action="{{route('idea.update', $idea->id)}}" method="POST">
    @csrf
    <label for="title">
        Title:
        <input type="text" name="title" value="{{$idea->title}}">
    </label><br>
    <label for="description">
        Description:
        <input type="text" name="description" value="{{$idea->description}}">
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

    <button type="submit">Update idea</button>

</form>
</body>
</html>
@endsection
