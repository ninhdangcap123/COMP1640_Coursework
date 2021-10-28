@extends('layouts.header')
@section('content')
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
@endsection
