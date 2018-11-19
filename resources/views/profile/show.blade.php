@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="jumbotron jumbotron-fluid">
                    <img style="width: 150px;" src="/img/profile-picture.jpg" alt="" class="rounded-circle mx-auto d-block">
                    <h1 class="text-center mt-3">{{ $user->name }}</h1>
                </div>
            </div>
        </div>
        <div class="container bg-light">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="mb-4">Latest posts</h2>
                    @foreach($personalPosts as $post)
                        <div class="post row">
                            <div class="col-6">
                                <h4 class="d-inline-block"><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
                                <p class="blockquote-footer">Last updated at {{ Carbon\Carbon::parse($post->updated_at)->format('d-m-Y')  }}</p>
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
                        {{ $personalPosts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
