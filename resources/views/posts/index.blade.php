@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Hier staan posts</h1>
                @foreach($posts as $post)
                    <div class="post row">
                        <div class="col-6">
                            <h4 class="d-inline-block"><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
                            <p class="blockquote-footer">Created by <a href="{{ route('profile.show', ['id' => \App\User::find($post->user_id)]) }}">{{ \App\User::find($post->user_id)->name }}</a></p>
                        </div>
                        @if($post->user_id === Auth::user()->id)
                        <div class="col-6 text-right">
                            <div class="btn btn-warning"><a href="{{ route('posts.edit', ['id' => $post->id]) }}">U</a></div>
                            {{Form::open([ 'method'  => 'delete', 'class' => 'd-inline-block', 'route' => [ 'posts.destroy', $post->id ] ]) }}
                                {{ Form::submit('D', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </div>
                        @endif
                    </div>
                    <hr>
                @endforeach
                <div class="pagination justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        <div class="add-button px-auto py-auto text-center"><a href="{{ route('posts.create') }}">+</a></div>
    </div>
@endsection
