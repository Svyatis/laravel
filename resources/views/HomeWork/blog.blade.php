@extends('layouts.main')

@section('content')

    <section class="container">
        <h2 id="blogGreatigs">{{ trans('main.Welcome to blog') }}, <i id="nameBlog"> {{Auth::user()->name}} !</i></h2>
        {{ Form::open(['route' => 'add_new_post']) }}
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="form-group">
            {{ Form::label(trans('main.Title')) }}
            <br>
            {{ Form::text('title', null, ['placeholder'=>trans('main.EnterTitle')]) }}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label(trans('main.Message')) }}
            <br>
            {{ Form::textarea('content', null,
                ['class'=>'textareaClass',
                 'placeholder'=>trans('main.YourMessage')]) }}
        </div>
        <br>
        <div class="form-group">
            {{ Form::submit(trans('main.Send'),
              ['class'=>'btn']) }}
        </div>
        {{ Form::close() }}
    </section>
@endsection
@section('aside')
    <section id="asideBar">
        @foreach($posts as $post)
            <article id="postArt">
                <h3 id="nameBloger">{{$post->title}}</h3>
                <p>{{$post->content}}</p>
                <div class="postFoot">Posted by {{$post->author->name}} at {{$post->created_at}}
                    @if(Auth::user()->id == $post->author_id || Auth::user()->admin) ---
                    <a class="deletePost" href="{{ URL::route('deletePost', ['postId' => $post->id]) }}">Delete</a></div>
                    @endif
                <hr>
            </article>
        @endforeach
        {{$posts->links()}}
    </section>
@endsection



