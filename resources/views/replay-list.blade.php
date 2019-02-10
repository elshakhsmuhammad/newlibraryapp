<div class="small well text-info reply-list" style="margin-left: 40px">


    <div class="modal fade" id="exampleModalLo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLoTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">edit reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('comment.update',$reply->id)}}" method="post" role="form">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <legend>Edit comment</legend>

                        <div class="form-group">
                            <input type="text" class="form-control" name="body" id=""
                                   placeholder="Input..." value="{{$reply->body}}">
                        </div>


                        <button type="submit" class="btn btn-success"> edit Reply</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


        {{--//delete form--}}

    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$reply->user->name}}<span style="font-size: .6em"
                    > {{$reply->created_at->diffForHumans()}}</span></h5>
                <p class="card-text">{{$reply->body}}</p>
                <form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>

                <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$reply->id}}" data-toggle="modal"
                   data-target="#exampleModalLo">edit</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

