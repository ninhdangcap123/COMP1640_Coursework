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
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <p>Author: {{$idea->users->name}} from department: {{$idea->users->departments->name}}</p>--}}
{{--                    <p><b> title: {{ $idea->title }}</b></p>--}}
{{--                    <p>--}}
{{--                        Description :{{ $idea->description }}--}}

{{--                    </p>--}}

{{--                    <p>--}}
{{--                        Related document:<a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>--}}
{{--                    </p>--}}
{{--                    <p>--}}
{{--                        Total views : {{$idea->views}}--}}
{{--                    </p>--}}
{{--                    <div >--}}
{{--                        <form action="{{ route('idea.like', $idea->id) }}"--}}
{{--                              method="post">--}}
{{--                            @csrf--}}
{{--                            <button class="far fa-thumbs-up ml-2">--}}
{{--                                class="{{ $idea->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-blue-600">--}}
{{--                                like--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div>--}}
{{--                        Total Likes: {{$idea->likeCount}}--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div>--}}
{{--                        Total Comments: {{ $idea->comments->count() }}--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <form action="{{ route('idea.unlike', $idea->id) }}"--}}
{{--                              method="post">--}}
{{--                            @csrf--}}
{{--                            <button class="far fa-thumbs-down ml-2">--}}
{{--                                class="{{ $idea->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white bg-red-600">--}}
{{--                                unlike--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <h4>Display Comments</h4>--}}
{{--                    @include('comment.replies', ['comments' => $idea->comments, 'idea_id' => $idea->id])--}}
{{--                    <hr />--}}

{{--                    <h4>Add comment</h4>--}}
{{--                    <form method="post" action="{{route('comment.store')}}">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" name="content" class="form-control" />--}}
{{--                            <input type="hidden" name="idea_id" value="{{ $idea->id }}" />--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="submit" class="btn btn-warning" value="Add Comment" />--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--                <div class="inner-main-body p-2 p-sm-3 collapse idea-content">--}}
{{--                    <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse"--}}
{{--                       data-target=".idea-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>--}}
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="media idea-item">

                                <div class="media-body ml-3">
                                    <a href="javascript:void(0)" class="text-secondary">{{$idea->users->name}} from {{ $idea->users->departments->name }}</a>
                                    <small class="text-muted ml-2">{{ $idea->created_at}}</small>
                                    <div class="mt-3 font-size-sm">
                                        <p>
                                            {{ $idea->description }}
                                            <br>
                                            #{{ $idea->categories->name }}
                                            <br>
                                        <a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>

                                        </p>
                                        @if(auth()->user()->user_role_id == 1 || auth()->user()->id == $idea->user_id)
                                            <form action="{{ route('idea.edit', $idea->id) }}" >
                                                <button type="submit" class="btn btn-outline-primary">Update</button>
                                            </form>
                                        @endif
                                        @if(auth()->user()->user_role_id == 1 || auth()->user()->id == $idea->user_id)

                                            <form action="{{ route('idea.delete', $idea->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        @endif

                                    </div>
                                </div>
                                <div class="text-muted small text-center">
                                    <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{$idea->views}} </span>
                                    <span><i class="far fa-comment ml-2"></i>  {{ $idea->comments->count() }}</span>
                                    <span><i class="far fa-thumbs-up ml-2">   </i>
                                        {{$idea->likeCount}}
                                    </span>
                                    <div >
                                        <form action="{{ route('idea.like', $idea->id) }}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-xs text-muted has-icon"><i class="far fa-thumbs-up"
                                                                                              aria-hidden="true"></i>
                                                {{--                                class="{{ $idea->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-blue-600">--}}
                                                like
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{ route('idea.unlike', $idea->id) }}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-xs text-muted has-icon"><i class="far fa-thumbs-down"
                                                                                              aria-hidden="true"></i>
                                                {{--                                class="{{ $idea->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white bg-red-600">--}}
                                                unlike
                                            </button>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
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
                    <div>
                        <h4>Display Comments</h4>
                        @include('comment.replies', ['comments' => $idea->comments, 'idea_id' => $idea->id])
                        <hr />
                    </div>




</body>
</html>

@endsection
