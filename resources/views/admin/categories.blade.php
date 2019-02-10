@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Categoriess</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a class="btn btn-primary" href="{{route('categories.create')}}">Add Category</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>delete </td>
                    <td>edit </td>
                </tr>
                </thead>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td><form  method="post"  action={{route('categories.destroy',$category->id)}} >
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value='DELETE'>
                                    <input class="btn btn-danger" type="submit" value="delete this category">
                                </form></td>
                            <td><a class="btn btn-info" href="{{route('categories.edit',$category->id)}}" >edit category</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    {{$categories->links() }}
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@stop
