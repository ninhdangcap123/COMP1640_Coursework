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
                                <div> <a href="{{route('admin.home')}}">List Users</a></div>
                                <div> <a href="{{route('admin.department.home')}}">List Departments</a></div>
                                <div> <a href="{{route('qam.home')}}">List Faculties</a></div>

                            @endif

                        @if(auth()->user()->user_role_id == 4)
                                You are {{ auth()->user()->name }}
                        @endif

                        @if(auth()->user()->user_role_id == 2)
                                You are {{ auth()->user()->name }}/{{ auth()->user()->userRoles->name }}
                                <div> <a href="{{route('qam.home')}}">List Faculties</a></div>
                            @endif



                        <div><a href="{{route('idea.index')}}">List Ideas</a></div>
                            @if(auth()->user()->user_role_id == 2)
                            Statistics:
                            <b>
                                <br>
                                - Total Users: {{ \App\Models\User::count() }}
                                <br>
                                - Total Departments: {{ \App\Models\Department::count() }}
                                <br>
                                - Total Users per Department:
                                @foreach(\App\Models\Department::all() as $department)
                                    <br>
                                    + Department: {{ $department->name }} has {{ \App\Models\User::where('department_id', $department->id)->count() }} users:
                                    @foreach($department->users as $user)
                                        <br>
                                        + User: {{ $user->name }} has {{ $user->ideas->count() }} idea(s)
                                    @endforeach
                                @endforeach
                                <br>
                                - Total Faculties: {{ \App\Models\Category::count() }}
                                <br>
                                - Total Ideas: {{ \App\Models\Idea::count() }}
                                <br>
                                - Total Ideas per Faculty:
                                @foreach(\App\Models\Category::all() as $category)
                                    <br>
                                   + Faculty: {{ $category->name }} has {{ \App\Models\Idea::where('category_id', $category->id)->count() }} ideas

                                @endforeach
                            </b>
                            @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

