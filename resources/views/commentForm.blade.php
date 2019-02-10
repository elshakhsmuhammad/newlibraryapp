<div class="panel panel-default" style="width: 80%;">
    <div class="panel-heading text-center">Comments</div>

    <div class="panel-body">
        @include('layouts.alerts')
        <form action="{{route('comment',$book->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <textarea class="form-control" name="body" placeholder="Enter Your Comment Here"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="addcomment" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
        <hr>
    </div>
</div>