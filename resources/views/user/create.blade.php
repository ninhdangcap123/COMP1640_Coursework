@extends('layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>1640</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
          integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- <script src="js/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
</head>
<body>
{{--<form action="{{route('admin.store')}}" method="post">--}}
{{--    @csrf--}}
{{--    <label for="Name">--}}
{{--        Name--}}
{{--        <input type="text" name="name">--}}
{{--    </label><br><br>--}}
{{--    <label for="Email">--}}
{{--        Email:--}}
{{--        <input type="text" name="email">--}}
{{--    </label><br><br>--}}
{{--    <label for="Password">--}}
{{--        Password:--}}
{{--        <input type="password" name="password">--}}
{{--    </label><br><br>--}}
{{--    <label for="Role">--}}
{{--        Role:--}}
{{--        <select name="user_role_id" id="">--}}
{{--            <option value="2">QAM</option>--}}
{{--            <option value="3">QAC</option>--}}
{{--            <option value="4">Staff</option>--}}
{{--            <option value="5">Guest</option>--}}
{{--        </select>--}}

{{--    </label><br><br>--}}
{{--    <label for="Role">--}}
{{--       Department:--}}
{{--        <select name="department_id" id="">--}}
{{--            @foreach($departments as $department)--}}
{{--                <option value="{{$department->id}}">{{$department->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}

{{--    </label><br><br>--}}

{{--    <button type="submit">Create user</button>--}}
{{--</form>--}}
<section class="h-50 h-custom gradient-custom-2">
    <div class="container h-50">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="{{route('admin.store')}}" method="post">
                            @csrf
                        <h3 class="fw-normal mb-5" style="color: #3567d4;">New User</h3>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                    <label class="form-label" for="form_fistname">Name</label>
                                    <label for="check" class="text-danger">*</label>
                                    <input type="text" id="form_firstname" class="form-control form-control-sm" name="name" required/>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="form_email">Email</label>
                                    <label for="check" class="text-danger">*</label>
                                    <input type="text" id="form_email" class="form-control form-control-sm" name="email" required />
                                </div>

                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form_phonenumber">Password</label>
                                <label for="check" class="text-danger">*</label>
                                <input type="password" id="form_password"
                                       class="form-control form-control-sm" name="password" required/>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label for="threadCategory">Role</label>
                                <select class="form-control form-control-sm w-auto mr-1" name="user_role_id">
                                    <option value="2">QAM</option>
                                    <option value="3">QAC</option>
                                    <option value="4">Staff</option>
                                    <option value="5">Guest</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label for="threadCategory">Department</label>
                                <select class="form-control form-control-sm w-auto mr-1" name="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <button type="submit" class="btn btn-primary btn-md"
                                        data-mdb-ripple-color="dark">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
@endsection
