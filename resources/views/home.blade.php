@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in! {{ Auth::user()->name }}
                <div class="card badge-dark" style="width: 48rem;">

                <a type="button" class="btn btn-light btn-lg colo-lg-8"href="{{url('/')}}">go to home page</a>
                <a type="button" class="btn btn-linkedin btn-lgcolo-lg-8"href="{{url('/admin/users')}}">go to Admin page</a>
                </div>
        </div>
    </div>


@endsection
