@extends('layouts.header')
@section('content')
{{--<a href="{{route('qam.create')}}">Create new Category</a> <hr>--}}
{{--<table border="1">--}}
{{--    <tr>--}}
{{--        <td>ID</td>--}}
{{--        <td>Name</td>--}}
{{--    </tr>--}}
{{--    @foreach($categories as $category)--}}

{{--        <tr>--}}
{{--            <td>{{ $category->id }}</td>--}}
{{--            <td>{{ $category->name }}</td>--}}
{{--            <td>--}}
{{--                <form action="{{ route('qam.delete', $category->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('delete')--}}
{{--                    <button type="submit" class="btn btn-outline-danger">Delete</button>--}}
{{--                </form>--}}
{{--            </td>--}}


{{--        </tr>--}}

{{--@endforeach--}}
{{--</table>--}}
<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Category</h3>
            </div>
            @if(auth()->user()->user_role_id == 2)
            <div class="pull-right" style="margin-top: 20px;">
                <a class="btn btn-success" href="{{ route('qam.create') }}">Add Category
                </a>
            </div>
            @endif
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Due Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>from {{ date('Y-m-d H:i:s', strtotime($category->start_date)) }} to {{ date('Y-m-d H:i:s', strtotime($category->end_date)) }}</td>
                <td>
                    @if(auth()->user()->user_role_id == 1 )
                    <form action="{{ route('qam.edit', $category->id) }}" >

                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
                    @endif
                    @if(auth()->user()->user_role_id == 2 )
                    <form action="{{ route('qam.delete', $category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                    @endif
                </td>

            </tr>
        @endforeach
    </table>
</div>
@endsection
