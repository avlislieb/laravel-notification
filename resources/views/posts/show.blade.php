@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="col-12">
                <p>{{ $post->body }}</p>
            </div>
            <div class="col-12">
                @include('posts.comments.comment')
            </div>
        </div>
    </div>
@endsection