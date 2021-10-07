@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(auth()->user()->user_role_id == 1)

                                You are {{ auth()->user()->name }}
                        @endif

                        @if(auth()->user()->user_role_id == 4)

                                You are {{ auth()->user()->name }}
                        @endif
{{--                        $test = auth()->user()->user_role_id--}}
{{--                            dd($test);--}}

                        @if(auth()->user()->user_role_id == 2)

                                You are {{ auth()->user()->name }}
                        @endif

                        @if(auth()->user()->user_role_id == 3)

                                You are {{ auth()->user()->name }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

