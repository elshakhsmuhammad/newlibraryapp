@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Users</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              <a class="btn btn-primary" href="{{route('users.create')}}">Add User</a>
               <a class="btn btn-primary" href="{{route('userRole')}}" >edit user role</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('layouts.alerts')
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>delete</td>
                    <td>edit</td>
                    <td>edit user role</td>

                </tr>
                </thead>
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td><form  method="post"  action={{route('users.destroy',$user->id)}} >
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value='DELETE'>
                                    <input class="btn btn-danger" type="submit" value="delete this user">
                                </form></td>
                            <td><a class="btn btn-info" href="{{route('users.edit',$user->id)}}" >edit user info</a></td>

                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    {{$users->links() }}
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@stop
