@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('posts.index') }}"><- Go back</a>
            </div>
            <div class="col-md-8">
                <h1 class="text-center">Hier kan jij je posts aanpassen</h1>
                <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold" for="title">Titel:</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="message">Bericht:</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ $post->message }}</textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-warning" type="submit" value="Aanpassen">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
