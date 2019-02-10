@extends('layouts.app')

@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Upload File</div>

                    <div class="panel-body">
                        @include('layouts.alerts')
                        <form action="{{route('upload.save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>titile</label>
                                <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" id="author" placeholder="Enter Author" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Some info on Book</label>
                                <textarea name="info" class="form-control" id="info" placeholder="Some info on Book"></textarea>
                            </div>
                            <div class="form-group">
                                <label>category of Book</label>
                                <select class="form-control" name="category">
                                    @if (count($allcategories) > 0)
                                        @foreach($allcategories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>image of Book</label>
                                <input type="file" name="image" id="image" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>file of Book</label>
                                <input type="file" name="book" id="book" class="form-control"/>
                            </div>
                            <div class="form-group">
                               <button type="submit" name="uplaod" class="btn btn-primary btn-block">Upload Book</button>
                            </div>
                        </form>
                    </div>
                </div>

@endsection
