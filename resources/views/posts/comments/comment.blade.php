<hr>
@if(\Auth::check())

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $key => $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="form-group">
        <input type="text" name="title" placeholder="Titulo" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="body" id="" cols="10" rows="5" placeholder="Comentario" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Enviar</button>
    </div>
</form>
@else
    <p>
        Precisa estar logado pra fazer os comentários.
        <a href="{{ route('login') }}">Clique aqui para fazer o login.</a>
    </p>
@endif

<hr>
<h3>Comentários ({{ $post->Comment->count() }})</h3>
<div>
    @forelse ($post->Comment as $comment)
        <p>
            <b>{{ $comment->User->name }} </b> comentou:
            {{ $comment->title }} - {{ $comment->body }}
        </p>
    @empty

    @endforelse
</div>