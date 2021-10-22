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
            <td>Departments</td>

            <td>Created at</td>
            <td>Download</td>

        </tr>

        @foreach($ideas as $idea)
        <tr>
            <td>{{$idea->id}}</td>
            <td>{{$idea->title}}</td>
            <td>{{$idea->description}}</td>
            <td>{{$idea->users->name}}</td>
            <td>{{$idea->categories->name}}</td>
            <td><a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a></td>
            <td>{{$idea->views}}</td>
            <td>{{$idea->likeCount}}</td>
{{--            <td>{{$idea->comments->content}}</td>--}}
{{--            <td>{{$idea->comments->content}}</td>--}}
            <td>{{$idea->users->departments->name}}</td>
            <td>{{$idea->created_at}}</td>

{{--            <a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>--}}
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
                        <form action="{{ route('idea.show', $idea->id) }}" >

                            <button type="submit" class="btn btn-outline-secondary">Show</button>
                        </form>

            <td>


        </tr>
        @endforeach

    </table>
    @if(auth()->user()->user_role_id == 2)

        <a href="{{route('idea.downloadAsZip')}}">Download all documents</a> <hr>
        <a href="{{route('idea.downloadAsCsv')}}">Download CSV </a> <hr>
    @endif
    <div class="card-footer d-flex justify-content">
        {{ $ideas->links() }}
    </div>

@endsection
