@extends('layouts.header')
@section('content')

{{--    <a href="{{route('idea.create')}}">Create new ideas</a> <hr>--}}
{{--    <table border="1">--}}
{{--        <tr>--}}
{{--            <td>ID</td>--}}
{{--            <td>Title</td>--}}
{{--            <td>Description</td>--}}
{{--            <td>Author</td>--}}
{{--            <td>Category</td>--}}
{{--            <td>Document</td>--}}
{{--            <td>Views</td>--}}
{{--            <td>Thumb points</td>--}}
{{--            <td>Departments</td>--}}

{{--            <td>Created at</td>--}}
{{--            <td>Download</td>--}}

{{--        </tr>--}}

{{--        @foreach($ideas as $idea)--}}
{{--        <tr>--}}
{{--            <td>{{$idea->id}}</td>--}}
{{--            <td>{{$idea->title}}</td>--}}
{{--            <td>{{$idea->description}}</td>--}}
{{--            <td>{{$idea->users->name}}</td>--}}
{{--            <td>{{$idea->categories->name}}</td>--}}
{{--            <td><a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a></td>--}}
{{--            <td>{{$idea->views}}</td>--}}
{{--            <td>{{$idea->likeCount}}</td>--}}
{{--            <td>{{$idea->comments->content}}</td>--}}
{{--            <td>{{$idea->comments->content}}</td>--}}
{{--            <td>{{$idea->users->departments->name}}</td>--}}
{{--            <td>{{$idea->created_at}}</td>--}}

{{--            <a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>--}}
{{--            <td>--}}
{{--                @if(auth()->user()->user_role_id == 1 || auth()->user()->id == $idea->user_id)--}}
{{--                <form action="{{ route('idea.edit', $idea->id) }}" >--}}
{{--                    <button type="submit" class="btn btn-outline-primary">Update</button>--}}
{{--                </form>--}}
{{--                @endif--}}
{{--                @if(auth()->user()->user_role_id == 1 || auth()->user()->id == $idea->user_id)--}}
{{--                <a href="{{route('idea.edit', $idea->id)}}">Update</a> <br>--}}
{{--                <form action="{{ route('idea.delete', $idea->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('delete')--}}
{{--                    <button type="submit" class="btn btn-outline-danger">Delete</button>--}}
{{--                </form>--}}
{{--                @endif--}}
{{--                        <form action="{{ route('idea.show', $idea->id) }}" >--}}

{{--                            <button type="submit" class="btn btn-outline-secondary">Show</button>--}}
{{--                        </form>--}}

{{--            <td>--}}


{{--        </tr>--}}
{{--        @endforeach--}}

{{--    </table>--}}
{{--    @if(auth()->user()->user_role_id == 2)--}}

{{--        <a href="{{route('idea.downloadAsZip')}}">Download all documents</a> <hr>--}}
{{--        <a href="{{route('idea.downloadAsCsv')}}">Download CSV </a> <hr>--}}
{{--    @endif--}}
{{--    <div class="card-footer d-flex justify-content">--}}
{{--        {{ $ideas->links() }}--}}
{{--    </div>--}}
<body>
<!-- Modal -->
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
                <div class="inner-main-header">



                        <a href="{{ route('idea.latest') }}">Latest ideas</a>
                        <a href="{{ route('idea.mostComment') }}">Most comments</a>
                        <a href="{{ route('idea.mostViewed') }}">Most viewed ideas</a>





{{--                    <span class="input-icon input-icon-sm ml-auto w-auto">--}}

{{--                            <input type="text"--}}
{{--                                   class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4"--}}
{{--                                   placeholder="Search ideas" />--}}
{{--                        </span>--}}
                    <form action="{{ route('idea.search') }}" method="GET" >
                        <input type="text" name="search" required placeholder="Search ideas"/>
                        <button type="submit">Search</button>
                    </form>
                </div>
                <!-- /Inner main header -->

                <!-- Inner main body -->

                <!-- idea List -->
                <div class="inner-main-body p-2 p-sm-3 collapse idea-content show">
                    <!-- data-isotope='{ "itemSelector": ".idea-item", "layoutMode": "fitRows"}' -->

            @if($ideas->isNotEmpty())
                    @foreach($ideas as $idea)
                    <div class="product-item vba">
                        <div class="product product_filter">
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media idea-item">

                                        <a href="#" data-toggle="collapse" data-target=".idea-content"></a>
                                        <div class="media-body">

                                            <form action="{{ route('idea.show', $idea->id) }}" >

                                                <button type="submit" class="btn btn-outline-secondary">{{ $idea->title }}</button>
                                            </form>
                                            at {{ $idea->created_at }}
                                            <p class="text-secondary">
                                                {{ $idea->description }}
                                                <br>
                                                #{{ $idea->categories->name }}
                                                @if($idea->created_at->lte($idea->categories->idea_end_date))
                                                    <b>Active</b>
                                                @else
                                                    <b>Closed</b>
                                                @endif
                                                <br>
                                            <a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}</a>

                                            </p>


                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{ $idea->views }}</span>
                                            <span><i class="far fa-comment ml-2"></i> {{ $idea->comments->count() }}</span>
                                            <span><i class="far fa-thumbs-up ml-2"></i>{{ $idea->likeCount }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <ul class="pagination pagination-primary pagination-circle justify-content-center mb-0">
                        {!! $ideas->links() !!}
                    </ul>
                </div>
            @else
                    <div>
                        <h2>No Ideas found</h2>
                    </div>
            @endif
                <!-- /idea List -->



                <!-- /Inner main body -->
            </div>
            <!-- /Inner main -->
        </div>

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
                                       autofocus="" name="title" required/>
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
                            <div class="mb-4 pb-2">
                                <div class="form-outline">

                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" required>
                                    <label for="vehicle1">By signing up you accept our <a href="#" >Terms Of Use</a>
                                    </label>
                                </div>
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
</body>
<script src="{{asset('js/custom.js')}}" defer></script>
<!-- Isotope File -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
</html>
@endsection
