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

                                You are {{ auth()->user()->name }}/{{auth()->user()->userRoles->name}}
                                <h2>List users</h2>
                                <a href="{{route('admin.create')}}">Create new user</a> <hr>
                                <table border="1">
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Role</td>
                                    </tr>
                                    @foreach($users as $user)
                                        @if($user->id > 1)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->userRoles->name }}</td>
{{--                                                <td>{{ $userRoles->level }}</td>--}}
                                                <td>
                                                    <a href="{{route('admin.update', $user->id)}}">Update</a> <br>
{{--                                                    <form action="{{route('admin.update',$user->id)}}" method="POST">--}}
{{--                                                        @csrf--}}
{{--                                                        <button type="submit" class="btn btn-outline-primary">Update</button>--}}
{{--                                                    </form>--}}

                                                    <form action="{{ route('admin.delete', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                <td>

                                            </tr>
                                        @endif
                                    @endforeach

                                </table>


                            @endif

                        @if(auth()->user()->user_role_id == 4)

                                You are {{ auth()->user()->name }}
                        @endif
{{--                        $test = auth()->user()->user_role_id--}}
{{--                            dd($test);--}}

                        @if(auth()->user()->user_role_id == 2)

                                You are {{ auth()->user()->name }}/{{ auth()->user()->userRoles->name }}

                                <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Document</title>
                                </head>
                                <body>
                                <h2>List Categories</h2>
                                <a href="{{route('qam.create')}}">Create new Category</a> <hr>
                                <table border="1">
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                    </tr>
                                    @foreach($categories as $category)

                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <form action="{{ route('qam.delete', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>


                                        </tr>

                                    @endforeach

                                </table>

                                </body>
                                </html>

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

