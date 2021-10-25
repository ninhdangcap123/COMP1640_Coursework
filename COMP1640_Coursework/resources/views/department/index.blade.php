@extends('layouts.header')
@section('content')
    <a href="{{route('qac.create')}}">Create new Department</a> <hr>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
        @foreach($departments as $department)

            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <form action="{{ route('qac.delete', $department->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>


            </tr>

        @endforeach
    </table>
@endsection
