@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>   --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(auth()->user()->user_role_id == 1)
                                You are {{ auth()->user()->name }}/{{auth()->user()->userRoles->name}}
                                <div><a href="{{route('admin.home')}}">List users</a></div>
                            @endif

                        @if(auth()->user()->user_role_id == 4)

                                You are {{ auth()->user()->name }}
                        @endif
{{--                        $test = auth()->user()->user_role_id--}}
{{--                            dd($test);--}}

                        @if(auth()->user()->user_role_id == 2)

                                You are {{ auth()->user()->name }}/{{ auth()->user()->userRoles->name }}
                                <div> <a href="{{route('qam.home')}}">List Categories</a></div>
                            @endif

                        @if(auth()->user()->user_role_id == 3)

                                You are {{ auth()->user()->name }}/{{auth()->user()->userRoles->name}}
                                <div> <a href="{{route('qac.home')}}">List Departments</a></div>

                        @endif

                        <div><a href="{{route('idea.index')}}">List Ideas</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

