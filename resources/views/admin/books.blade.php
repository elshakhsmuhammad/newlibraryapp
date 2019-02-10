@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title text-center">books</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a class="btn btn-primary" href="{{route('upload')}}">Add book</a>
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
                    <td>title</td>
                    <td>author</td>
                    <td>info</td>
                    <td>delete </td>
                    <td>edit </td>
                </tr>
                </thead>
                @if(count($books) > 0)
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->info}}</td>
                            <td><form  method="post"  action={{route('books.destroy',$book->id)}} >
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value='DELETE'>
                                    <input class="btn btn-danger" type="submit" value="delete this book">
                                </form></td>
                            <td><a class="btn btn-info" href="{{route('books.edit',$book->id)}}" >edit book</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    {{$books->links() }}
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

@stop
