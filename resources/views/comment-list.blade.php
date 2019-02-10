<div class="row" style="margin-top: 10px; width: 95%;" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$comment->user->name}}<span style="font-size: .6em"
                           > {{$comment->created_at->diffForHumans()}}</span></h5>
                <p class="card-text">{{$comment->body}}</p>

                <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>

                    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}" data-toggle="modal"
                       data-target="#exampleModalLong">edit</a>
                <button class="btn btn-default btn-xs" id="{{$comment->id}}-count" >{{$comment->likes()->count()}}</button>
                <span  class="btn btn-default btn-xs  {{$comment->isLiked()?"liked":""}}" onclick="Like('{{$comment->id}}',this)">
         <i class="glyphicon glyphicon-heart" aria-hidden="true"></i></span>
                <p>{{$comment->comments()->count()}} reply</p>
            </div>
        </div>
    </div>



    {{--<a href="class="btn btn-info btn-xs">Edit</a>--}}



    {{--//delete form--}}




    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">edit comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <legend>Edit comment</legend>

                        <div class="form-group">
                            <input type="text" class="form-control" name="body" id=""
                                   placeholder="Input..." value="{{$comment->body}}">
                        </div>
                        <button type="submit" class="btn btn-primary"> edit Comment</button>
                    </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@section('js')
    <script type="text/javascript">


        function Like(commentId,elem){
            var csrfToken='{{csrf_token()}}';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
                console.log(data);
                if(data.message==='liked'){
                    $(elem).addClass('liked');
                    $('#'+commentId+"-count").text(likesCount+1);
                //    $(elem).css({color:'red'});
                }else{
                //    $(elem).css({color:'black'});
                    $('#'+commentId+"-count").text(likesCount-1);
                    $(elem).removeClass('liked');
                }
            });

        }


    </script>

@endsection