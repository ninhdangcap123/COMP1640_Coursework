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
<form action="{{route('admin.store')}}" method="post">
    @csrf
    <label for="Name">
        Name
        <input type="text" name="name">
    </label><br><br>
    <label for="Email">
        Email:
        <input type="text" name="email">
    </label><br><br>
    <label for="Password">
        Password:
        <input type="text" name="password">
    </label><br><br>
    <label for="Role">
        Role:
        <input type="number" name="user_role_id">
    </label><br><br>
{{--    <div class="col-md-2">--}}
{{--        <div class="form-group">--}}
{{--            <label for="user_role"> Select User: </label>--}}
{{--            <select disabled="disabled" class="form-control select" id="user_type">--}}
{{--                <option value="">{{ strtoupper($user->name) }}</option>--}}
{{--                @dd(auth()->user()->user_role_id);--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}
    <button type="submit">Create user</button>
</form>
</body>
</html>
