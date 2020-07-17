@extends("layouts.app")
@section("content")
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $article->created_at->diffForHumans()}}
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <a href="{{ url("/articles/delete/$article->id")}}" class="btn btn-danger">Delete</a>
        </div>
    </div>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
    </div>
    @endif

    <ul class="list-group">
        <li class="list-group-item active">
            <b>Comments ( {{ count($article->comments) }} )</b>
        </li>
        @foreach($article->comments as $comment)
        <li class="list-group-item">
            {{ $comment->content}}
            <a href="{{ url("/comments/delete/$comment->id")}}" class="close">&times;</a>
            <div class="small mt-2">
                By <b>{{ $comment->user->name }}</b>
                    {{ $comment->created_at->diffForHumans() }}
            </div>
        </li>
        @endforeach
    </ul>

    <br>
    @auth

     <form method="post" action="{{ url('/comments/add') }}">
        @csrf

        <input type="hidden" name="article_id" value="{{ $article->id }}">

        <div class="form-group">
            <textarea name="content" class="form-control mb-2" placeholder="New comment"></textarea>
        </div>

        <input type="submit" value="Add Comment" class="btn btn-primary">

    </form>
    @endauth
</div>
@endsection