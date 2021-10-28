@extends('layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Create user</h2>
<form action="{{route('admin.update', $user->id)}}" method="post">
    @csrf
    <label for="Name">
        Name:
        <input type="text" name="name" value="{{ $user->name }}">
    </label><br><br>
    <label for="Email">
        Email:
        <input type="text" name="email" value="{{ $user->email }}">
    </label><br><br>
    <label for="Password">
        Password:
        <input type="password" name="password" >
    </label><br><br>
    <label for="Role">
        Role:
        <select name="user_role_id" id="">
            <option value="2">QAM</option>
            <option value="3">QAC</option>
            <option value="4">Staff</option>
            <option value="5">Guest</option>
        </select>
    </label><br><br>
    <button type="submit">Edit user</button>
</form>

</body>
</html>
@endsection
