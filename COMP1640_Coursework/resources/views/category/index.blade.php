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
            <div class="pull-right" style="margin-top: 20px;">
                <a class="btn btn-success" href="{{ route('qam.create') }}">Add Category
                </a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
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
</div>
@endsection
