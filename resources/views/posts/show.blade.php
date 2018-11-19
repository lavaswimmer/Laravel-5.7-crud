@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url()->previous() }}"><- Go back</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{ $post->title }}</h1>
                <p class="lead">{{ $post->message  }}</p>
                <p class="blockquote-footer text-right">last updated at {{ Carbon\Carbon::parse($post->updated_at)->format('d-m-Y')  }}</p>
            </div>
        </div>
    </div>
@endsection
