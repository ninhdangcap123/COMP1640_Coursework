@extends('layouts.header')
@section('content')

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
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="main-body p-0">
        <div class="inner-wrapper">
            <!-- Inner sidebar -->
            <div class="inner-sidebar">
                <!-- Inner sidebar header -->
                <div class="inner-sidebar-header justify-content-center">
                    <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal"
                            data-target="#threadModal" onclick="location.href='#'">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-plus mr-2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        NEW IDEA
                    </button>
                </div>
                <!-- /Inner sidebar header -->

                <!-- Inner sidebar body -->
                <div class="inner-sidebar-body p-0">
                    <div class="p-3 h-100" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -16px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">

                                    <div class="simplebar-content" style="padding: 16px;">
                                        <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                            <a href="{{ route('idea.index') }}"
                                               class="nav-link nav-link-faded has-icon active">All Faculties</a>
                                            @foreach($categories as $category)
                                                <a href="{{ route('idea.getIdeas', $category->id) }}"
                                                   class="nav-link nav-link-faded has-icon active">{{ $category->name }}</a>
                                            @endforeach
                                            <a href="javascript:void(0)"
                                               class="nav-link nav-link-faded has-icon">Others</a>
                                        </nav>
                                    </div>
                                    @if(auth()->user()->user_role_id == 2)

                                        <a href="{{route('idea.downloadAsZip')}}">Download all documents</a> <hr>
                                        <a href="{{route('idea.downloadAsCsv')}}">Download CSV </a> <hr>
                                    @endif
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                 style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                        </div>
                    </div>
                </div>
                <!-- /Inner sidebar body -->
            </div>
            <!-- /Inner sidebar -->

            <!-- Inner main -->
            <div class="inner-main">
                <!-- Inner main header -->

                <!-- /Inner main header -->

                <!-- Inner main body -->
                <!-- idea Detail -->
                <div class="inner-main-body p-2 p-sm-3 ">
                    <a href="{{ route('idea.index') }}" class="btn btn-light btn-sm mb-3 has-icon" ><i class="fa fa-arrow-left mr-2"></i>Back to home</a>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="media idea-item">

                                <div class="media-body ml-3">
                                    <a href="javascript:void(0)" class="name-user">{{ $idea->users->name }} from {{ $idea->users->departments->name }}</a>
                                    <small class="time-upload text-muted ml-2">at {{ $idea->created_at }}</small>
                                    <h5 class="title-idea mt-1">{{ $idea->title }}</h5>
                                    <div class="Description-idea mt-3 font-size-sm">
                                       <p>
                                           {{ $idea->description }}

                                       </p>
                                    </div>
                                    @if(is_null($idea->document))
                                        No Related Documents
                                    @else
                                        Related Documents:<a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>
                                    @endif


                                </div>

                                <div class="text-muted small text-center">
                                    <span class="d-none d-sm-inline-block"><a class="far fa-eye"></a> {{ $idea->views }}</span>
                                    <span><a class="far fa-comment ml-2"></a> {{ $idea->comments->count() }}</span>
                                    <span><a class="far fa-thumbs-up ml-2"></a> {{ $idea->likeCount }}</span>

                                </div>

                            </div>
{{--                            <embed src="{{ asset("storage/document/$idea->document") }}"--}}
{{--                                   width="800px" height="300px" />--}}
{{--                            <iframe src="{{ url('storage/app/ideas'.$idea->document) }}" frameborder="0"></iframe>--}}
{{--                            <button class="btn btn-xs text-muted has-icon"><i class="far fa-thumbs-up"--}}
{{--                                                                              aria-hidden="true"></i></button>--}}
                            <div >
                                <form action="{{ route('idea.like', $idea->id) }}"
                                      method="post">
                                    @csrf
                                    <button class="btn btn-xs text-muted has-icon" aria-hidden="true">
                                        <span class="far fa-thumbs-up"> Like
                                    </button>
                                </form>
                                <form action="{{ route('idea.unlike', $idea->id) }}"
                                      method="post">
                                    @csrf
                                    <button class="btn text-muted has-icon" aria-hidden="true">
                                        <span class="far fa-thumbs-down"> Dislike
                                    </button>
                                </form>
                            </div>
                            
                            {{-- <embed src="{{URL::to('public/documents/'.$idea->product_image)}}"
                                    width="650px" height="300px" />
                         --}}
{{--                            <button class="btn text-muted has-icon"><i class="far fa-thumbs-down"--}}
{{--                                                                       aria-hidden="true"></i></button>--}}

                            <p>Display Comments</p>
                            @if(now()->lte(date('Y-m-d H:i:s', strtotime($idea->categories->comment_end_date))))
                            <form method="post" action="{{route('comment.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="content" class="form-control" required/>
                                    <input type="hidden" name="idea_id" value="{{ $idea->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" value="Add Comment" required/>
                                </div>
                            </form>
                            @endif
                            @include('comment.replies', ['comments' => $idea->comments, 'idea_id' => $idea->id])
                            <hr />

                        </div>
                    </div>


                </div>
                <!-- /idea Detail -->



        <!-- New Thread Modal -->
        <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
             aria-hidden="true">

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <form action="{{ route('idea.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header d-flex align-items-center bg-primary text-white">
                            <h6 class="modal-title mb-0" id="threadModalLabel">New Idea</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="threadTitle" >Title</label>
                                <input type="text" class="form-control" id="threadTitle" placeholder="Enter title"
                                       autofocus="" name="title"/>
                            </div>
                            <div class="form-group">
                                <label for="threadDescription">Description</label>

                                <textarea class="form-control" id="threadIdea" placeholder="Your Description" required="" name="description"></textarea>
                            </div>
                            <textarea class="form-control summernote" style="display: none;"></textarea>

                            <div class="form-group">
                                <label for="threadPostAs">Post as</label>
                                <select class="form-control form-control-sm w-auto mr-1" name="user_id">
                                    <option value="{{ auth()->user()->id }}">Yourself</option>
                                    <option value="5">Anonymous</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="threadCategory">Faculties</label>
                                <select class="form-control form-control-sm w-auto mr-1" name="category_id">
                                    @foreach($categories as $category)
                                        @if(now()->lte(date('Y-m-d H:i:s', strtotime($category->idea_end_date))))
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="threadDocument">Document</label>
                                <br><input type="file" name="document">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="{{asset('js/custom.js')}}" defer></script>