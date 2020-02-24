@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->
    <!-- Title -->
    <h1>{{$post->title}}</h1>
    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>
    <hr>
    <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
    <hr>
    <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">
    <hr>
    <!-- Post Content -->
        <p>{{$post->body}}</p>
    <hr>
    @if (Session::has('comment_messaege'))
        {{ session('comment_messaege') }}
    @endif
    @if (Session::has('reply_messaege'))
        {{ session('reply_messaege') }}
    @endif
    <!-- Blog Comments -->
    <!-- Comments Form -->
    @if (Auth::check())
        <div class="well">
            <h4>Leave a Comment:</h4>
            {{ Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) }}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {{ Form::label('body','Body:') }}
                    {{ Form::textarea('body',null,['class'=>'form-control','rows'=>3]) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Submit Comment',['class'=>'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    @endif
    <hr>
    <!-- Posted Comments -->
    <!-- Comment -->
    @if (count($comments) > 0)
        @foreach ($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->author }}
                    <small>{{$comment->created_at}}</small>
                </h4>
                {{$comment->body}}
                @if (count($comment->replies))
                    @foreach ($comment->replies as $reply)
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="nested-comment">
                                    <h4 class="media-heading">{{ $reply->author }}
                                        <small>{{$reply->created_at}}</small>
                                    </h4>
                                </div>
                                <div class="media-object">{{$reply->body}}</div>
                            </div>
                    <!-- End Nested Comment -->
                    @endforeach
                @endif
                <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                    <div class="comment-reply">
                        {{ Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) }}
                            <input type="hidden" name="comment_id" value="{{$reply->id}}">
                            <div class="form-group">
                                {{ Form::textarea('body',null,['class'=>'form-control','rows'=>1]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Submit',['class'=>'btn btn-primary']) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    @section('scripts')
        <script>
            $(".comment-reply-container .toggle-reply").click(function(){

                $(this).next().slideToggle('slow');

            })
        </script>

    @endsection
@endsection
