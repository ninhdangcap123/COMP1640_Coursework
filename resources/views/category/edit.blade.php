@extends('layouts.header')
@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>1640</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- <script src="js/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h2>Update Faculty</h2>
                        </div>
                    </div>
                    <form action="{{route('qam.update', $category->id)}}" method="POST">
                        @csrf
                        <label for="name">
                            Name:
                            <input type="text" name="name" value="{{$category->name}}">
                        </label><br>
                        <label for="start_date">
                            Idea_Start_date:
                            <input type="datetime-local" name="idea_start_date" value="{{$category->idea_start_date}}">
                        </label><br>
                        <label for="end_date">
                            Idea_End_date:
                            <input type="datetime-local" name="idea_end_date" value="{{$category->idea_end_date}}">
                        </label><br>
                        <label for="start_date">
                            Comment_Start_date:
                            <input type="datetime-local" name="comment_start_date" value="{{$category->comment_start_date}}">
                        </label><br>
                        <label for="end_date">
                            Comment_End_date:
                            <input type="datetime-local" name="comment_end_date" value="{{$category->comment_end_date}}">
                        </label><br>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Update</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/login.js') }}"></script>

</body>

</html>
@endsection
