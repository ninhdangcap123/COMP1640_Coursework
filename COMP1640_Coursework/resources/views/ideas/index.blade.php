@extends('layouts.header')
@section('content')
--}}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
          integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <!-- <script src="js/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
</head>

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
                                               class="nav-link nav-link-faded has-icon active">All Category</a>
                                            @foreach($categories as $category)
                                                <a href="{{ route('idea.getIdeas', $category->id) }}"
                                                   class="nav-link nav-link-faded has-icon active">{{ $category->name }}</a>
                                            @endforeach
                                            <a href="javascript:void(0)"
                                               class="nav-link nav-link-faded has-icon">Others</a>
                                        </nav>
                                    </div>
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
                    <select class="custom-select custom-select-sm w-auto mr-1">
                        <option data-filter="*" value="">Latest ideas</option>
                        <option data-filter=".nba" value="1">Latest ideas</option>
                        <option data-filter=".shoes" selected="2">Latest comments</option>
                        <option data-filter=".clothing" value="3">Most viewed ideas</option>
                        <option data-filter=".vba" value="4">Most popular ideas</option>

                    </select>
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
                                            <p class="text-secondary">
                                                {{ $idea->description }}
                                                <br>
                                                #{{ $idea->categories->name }}
                                                <br>
                                                <a href="{{ route('idea.download', $idea->uuid) }}">{{ $idea->document }}
                                            </p>


                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i>
                                                    {{ $idea->views }}</span>
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

                <!-- idea Detail -->
{{--                <div class="inner-main-body p-2 p-sm-3 collapse idea-content">--}}
{{--                    <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse"--}}
{{--                       data-target=".idea-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>--}}
{{--                    @include('ideas.show', ['idea_id'=> $idea->id])--}}
{{--                    <div class="card mb-2">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media idea-item">--}}

{{--                                <div class="media-body ml-3">--}}
{{--                                    <a href="javascript:void(0)" class="text-secondary">Tran Nhat Minh</a>--}}
{{--                                    <small class="text-muted ml-2">1 hour ago</small>--}}
{{--                                    <h5 class="mt-1">Realtime fetching data</h5>--}}
{{--                                    <div class="mt-3 font-size-sm">--}}
{{--                                        <p>Hellooo :)</p>--}}
{{--                                        <p>--}}
{{--                                            I'm newbie with laravel and i want to fetch data from database in--}}
{{--                                            realtime for my dashboard anaytics and i found a solution with ajax but--}}
{{--                                            it dosen't work if any one have a simple solution it will be--}}
{{--                                            helpful--}}
{{--                                        </p>--}}
{{--                                        <p>Thank</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="text-muted small text-center">--}}
{{--                                    <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>--}}
{{--                                    <span><i class="far fa-comment ml-2"></i> 3</span>--}}
{{--                                    <span><i class="far fa-thumbs-up ml-2"></i> 3</span>--}}
{{--                                    <span><i class="far fa-thumbs-down ml-2"></i> 3</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card mb-2">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media idea-item">--}}

{{--                                <div class="media-body ml-3">--}}
{{--                                    <a href="javascript:void(0)" class="text-secondary">Bui Khanh Toan</a>--}}
{{--                                    <small class="text-muted ml-2">1 hour ago</small>--}}
{{--                                    <div class="mt-3 font-size-sm">--}}
{{--                                        <p>Co moi cai trang home lam mai khong xong.</p>--}}
{{--                                    </div>--}}
{{--                                    <button class="btn btn-xs text-muted has-icon"><i class="far fa-thumbs-up"--}}
{{--                                                                                      aria-hidden="true"></i>1000</button>--}}
{{--                                    <a href="javascript:void(0)" class="text-muted small">Reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card mb-2">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media idea-item">--}}

{{--                                <div class="media-body ml-3">--}}
{{--                                    <a href="javascript:void(0)" class="text-secondary">Tran Nhat Minh</a>--}}
{{--                                    <small class="text-muted ml-2">30 minutes ago</small>--}}
{{--                                    <div class="mt-3 font-size-sm">--}}
{{--                                        <p>@reply Bui Khanh Toan: Co gioi thi vao ma lam.</p>--}}
{{--                                    </div>--}}
{{--                                    <button class="btn btn-xs text-muted has-icon"><i class="far fa-thumbs-up"--}}
{{--                                                                                      aria-hidden="true"></i>2000</button>--}}
{{--                                    <a href="javascript:void(0)" class="text-muted small">Reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- /idea Detail -->

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
                                <label for="threadCategory">Category</label>
                                <select class="form-control form-control-sm w-auto mr-1" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
</body>
<script src="{{asset('js/custom.js')}}" defer></script>
<!-- Isotope File -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
</html>
@endsection
