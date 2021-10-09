<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>List users</h2>
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
