@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Users</h3>
                </div>
                <div class="pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success" href="{{route('admin.create')}}">Create new user
                    </a>
                </div>
            </div>
        </div>


<table border="1" class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Role</td>
        <td>Department</td>
    </tr>
    @foreach($users as $user)
        @if($user->id > 1)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->userRoles->name }}</td>
                <td>{{ $user->departments->name }}</td>

                <td>
                    <form action="{{ route('admin.update', $user->id) }}" >

                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
{{--                    <a href="{{route('admin.update', $user->id)}}">Update</a> <br>--}}
                    <form action="{{ route('admin.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                <td>

            </tr>
@endif
@endforeach
@endsection
