@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>Author: {{$idea->users->name}} from department: {{$idea->users->departments->name}}</p>
                    <p><b> title: {{ $idea->title }}</b></p>
                    <p>
                        Description :{{ $idea->description }}

                    </p>

                    <p>
                        Related document:<a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>
                    </p>
                    <div>
                        <form action="{{ route('idea.like', $idea->id) }}"
                              method="post">
                            @csrf
                            <button>
{{--                                class="{{ $idea->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-blue-600">--}}
                                like
                            </button>
                        </form>
                    </div>
                    <br>
                    <div>
                        Total Likes: {{$idea->likeCount}}
                    </div>
                    <br>
                    <div>
                        <form action="{{ route('idea.unlike', $idea->id) }}"
                              method="post">
                            @csrf
                            <button>
{{--                                class="{{ $idea->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white bg-red-600">--}}
                                unlike
                            </button>
                        </form>
                    </div>
                    <h4>Display Comments</h4>
                    @include('comment.replies', ['comments' => $idea->comments, 'idea_id' => $idea->id])
                    <hr />

                    <h4>Add comment</h4>
                    <form method="post" action="{{route('comment.store')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="content" class="form-control" />
                            <input type="hidden" name="idea_id" value="{{ $idea->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
