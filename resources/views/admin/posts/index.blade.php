@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>body</th>
                <th>Post link</th>
                <th>Comments</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>

        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height=50 src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}"></td>
                        <td><a href="{{ route('posts.edit',$post->id)}}">{{ $post->user->name }}</td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{Str::limit($post->body, 20)}}</td>
                        <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                        <td><a href="{{route('comments.show',$post->id)}}">View Comment</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach

            @endif

        </tbody>


    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $posts-> render()}}
        </div>
    </div>
@endsection
