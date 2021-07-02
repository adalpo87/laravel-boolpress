@extends('layouts.app')

@section('content')
<div class="container">
    <h1>NUOVO POST</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
     
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label class="label-control" for="title">Titolo</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="label-control" for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" type="text" id="content" name="content" rows="4">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button class="btn btn-dark" type="submit">INVIA</button>
                <button class="btn btn-warning" type="reset">RESET</button>
            </div>
        </form>
    </div>
    
</div>
@endsection