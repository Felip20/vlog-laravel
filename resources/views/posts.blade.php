@extends('layout')

@section('title')
    <title>All Posts</title>
@endsection

@section('content')

    @foreach ($posts as $post)

        <h1><a href="posts/{{$post->slug}} ">{{$post->title}} </a></h1>

            <div>
                <p>published at - {{$post->date}}
                <p>{{$post->intro}}</p>
            </div>

    @endforeach

@endsection
 

