
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-black text-lg-center">Book name: {{$book->title}}</div>

        <div class="panel-body">
            <div class="row">
                <div class="card bg-dark text-bold text-white text-lg-center" style="width: 70%;font-size: 1.3em;">
                    <img class="card-img img-responsive" src="{{asset('storage/thumbnails/'.$book->image)}}" alt="Card image">
                    <div class="card-img-bottom">
                        <h5 class="card-title">book title : {{$book->title}}</h5>
                        <p class="card-text">some book info.: {{$book->info}}</p>
                        <p class="card-text">book author:{{$book->author}}</p>
                        <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>

                    </div>

                </div>

                <!-- /.col-md-9 -->
            </div>

        </div>

    </div>
    @foreach($book->comments as $comment)
        <div class="comment-list well well-lg">
            @include('comment-list')
        </div>
        <hr>
       <div>
        {{--reply to comment--}}
        <button type="button" class="btn btn-dropbox" data-toggle="modal" data-target="#exampleModalLon" href="#{{$comment->id}}">
          Reply
        </button>
        <div class="modal fade" id="exampleModalLon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLonTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">add reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            <legend>Create Reply</legend>

                            <div class="form-group">
                                <input type="text" class="form-control" name="body" id="" placeholder="Reply...">

                            </div>


                            <button type="submit" class="btn btn-primary">Reply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>

                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--//reply form--}}

        <br>

        @foreach($comment->comments as $reply)
            @include('replay-list')

        @endforeach


    @endforeach
    <br><br>
    @include('commentForm')

        </div>
        <hr>

        {{--reply to comment--}}

        </div>
    </div>

@endsection
