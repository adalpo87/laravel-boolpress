@extends('layouts.app')

@section('content')
<div class="container">
    <h1>NUOVO POST</h1>
    
    <div>
     
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label class="label-control" for="title">Titolo</label>
                <input class="form-control" type="text" id="title" name="title">
            </div>
            <div class="mb-4">
                <label class="label-control" for="content">Content</label>
                <textarea class="form-control" type="text" id="content" name="content" rows="4"></textarea>
            </div>
            <div>
                <button class="btn btn-dark" type="submit">INVIA</button>
                <button class="btn btn-warning" type="reset">RESET</button>
            </div>
        </form>
    </div>
    
</div>
@endsection