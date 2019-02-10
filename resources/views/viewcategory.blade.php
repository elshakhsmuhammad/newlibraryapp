@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">{{$category->name}}</div>

        <div class="panel-body">
            @if (count($books) > 0)
                @foreach($books as $book)
                    <div class="panel-body">
                        <div class="row">
                            <div class="card bg-dark text-bold text-danger text-lg-center" style="width: 65%;font-size: 1.3em;
                            margin-bottom: 4px;">
                                <img class="card-img img-responsive" src="{{asset('storage/thumbnails/'.$book->image)}}" alt="Card image">
                                <div class="card-img-overlay center-block">
                                    <h5 class="card-title">book title : {{$book->title}}</h5>
                                    <p class="card-text">some book info.: {{$book->info}}</p>
                                    <p class="card-text">book author:{{$book->author}}</p>
                                    <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>
                                    <a href="{{route('book',$book->id)}}" class="btn btn-info">More info</a>
                                </div>
                            </div>
                            <!-- /.col-md-9 -->
                        </div>
                    </div>
                    @endforeach
                @endif
        </div>
    </div>

@endsection
