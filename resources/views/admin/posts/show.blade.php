@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post['title'] }}</h1>
    <h3>@if ($post->category)
        Categoria: {{ $post->category->name}}
    @else
        Nessuna Categoria
    @endif
    </h3>
    <div>
        @foreach ($post->tags as $tag)
           <span class="badge badge-primary">{{ $tag->name }}</span>
        @endforeach
    </div>
    <p>{{ $post['content']}}</p>
    <div>
        <a class="btn btn-dark" href="{{ route('admin.posts.edit', $post)}}">EDIT</a>
    </div>
</div>
@endsection
