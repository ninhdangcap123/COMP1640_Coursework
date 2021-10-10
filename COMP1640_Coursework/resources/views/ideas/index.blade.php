@extends('layouts.app')
@section('content')
    <a href="{{route('idea.create')}}">Create new ideas</a> <hr>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Description</td>
            <td>Author</td>
            <td>Category</td>
            <td>Views</td>
            <td>Thumb points</td>
{{--            <td>Comments</td>--}}
            <td>Departments</td>
            <td>Created at</td>

        </tr>

        @foreach($ideas as $idea)
        <tr>
            <td>{{$idea->id}}</td>
            <td>{{$idea->title}}</td>
            <td>{{$idea->description}}</td>
            <td>{{$idea->users->name}}</td>
            <td>{{$idea->categories->name}}</td>
            <td>{{$idea->views}}</td>
            <td>{{$idea->thumb_points}}</td>
{{--            <td>{{$idea->comments->content}}</td>--}}
            <td>{{$idea->users->departments->name}}</td>
            <td>{{$idea->created_at}}</td>


        </tr>
        @endforeach
    </table>
            {!! $ideas->links() !!}
@endsection
