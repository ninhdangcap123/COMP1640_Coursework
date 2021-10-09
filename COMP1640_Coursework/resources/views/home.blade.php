@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(auth()->user()->user_role_id == 1)

                                You are {{ auth()->user()->name }}
                                <h2>List users</h2>
                                <a href="{{route('admin.create')}}">Create new user</a> <hr>
                                <table border="1">
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{route('admin.update',$user->id)}}">Update</a> <br>
                                                <a href="{{route('admin.delete', $user->id)}}">Delete</a>
                                            <td>
                                        </tr>
                                    @endforeach

                                </table>


                            @endif

                        @if(auth()->user()->user_role_id == 4)

                                You are {{ auth()->user()->name }}
                        @endif
{{--                        $test = auth()->user()->user_role_id--}}
{{--                            dd($test);--}}

                        @if(auth()->user()->user_role_id == 2)

                                You are {{ auth()->user()->name }}
                        @endif

                        @if(auth()->user()->user_role_id == 3)

                                You are {{ auth()->user()->name }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

