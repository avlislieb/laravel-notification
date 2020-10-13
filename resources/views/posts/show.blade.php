@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem posts</h1>
                <hr>
            </div>
            <div class="col-12">
                @forelse($listPost as $key => $post)
                    <a href="{{ route('posts.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                    <hr>
                @empty
                    <p>Nenhum post encontrado</p>
                @endforelse
            </div>
            <div class="col-12">
                {!! $listPost->links() !!}
            </div>
        </div>
    </div>
@endsection