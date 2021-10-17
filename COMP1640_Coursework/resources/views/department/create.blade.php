<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Create Department</h2>
<form action="{{route('qac.store')}}" method="post">
    @csrf
    <label for="Name">
        Name
        <input type="text" name="name">
    </label><br><br>

    <button type="submit">Create Department</button>
</form>
</body>
</html>
