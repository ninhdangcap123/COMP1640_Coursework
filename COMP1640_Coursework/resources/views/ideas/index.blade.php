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
            <td>Document</td>
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
            <td>{{$idea->document}}</td>
            <td>{{$idea->views}}</td>
            <td>{{$idea->thumb_points}}</td>
{{--            <td>{{$idea->comments->content}}</td>--}}
            <td>{{$idea->users->departments->name}}</td>
            <td>{{$idea->created_at}}</td>
            <td>
                @if(auth()->user()->user_role_id == 1 || auth()->user()->id == $idea->user_id)
                <form action="{{ route('idea.edit', $idea->id) }}" >
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </form>
                @endif
                @if(auth()->user()->user_role_id == 1 || auth()->user()->id == $idea->user_id)
{{--                <a href="{{route('idea.edit', $idea->id)}}">Update</a> <br>--}}
                <form action="{{ route('idea.delete', $idea->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endif
            <td>


        </tr>
        @endforeach
    </table>
    <div class="card-footer d-flex justify-content">
        {{ $ideas->links() }}
    </div>

@endsection
