@extends('layouts.main')

@section('content')

@if(Auth::check())
    <section class="container">
        <h2 id="blogGreatigs">Welcome to Blog, <i id="nameBlog"> {{Auth::user()->name}} !</i></h2>
        {{ Form::open(['route' => 'add_new_post', 'class' => 'form']) }}
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="form-group">
            {{ Form::label('Title') }}
            <br>
            {{ Form::text('title', null,
                ['required',
                      'class'=>'form-control',
                      'placeholder'=>'enter title']) }}
        </div>
        <br>
        <div class="textareaClass">
            {{ Form::label('Your Message') }}
            <br>
            {{ Form::textarea('content', null,
                ['required',
                      'class'=>'textareaClass',
                      'cols'=>'30',
                      'rows'=>'5',
                      'placeholder'=>'Your message']) }}
        </div>
        <br>
        <div class="form-group">
            {{ Form::submit('Send',
              ['class'=>'btn']) }}
        </div>
        {{ Form::close() }}
@else
    <section class="container">
        <div class="login">
            <h1>Please Login</h1>
            <form name="login" method="POST" action="{{URL::route('login')}}">
                <p><input type="text" name="email" value="" placeholder="Email"></p>
                <p><input type="password" name="password" value="" placeholder="Password"></p>
                <p class="submit"><input type="submit" name="commit" value="Login"></p>
            </form>
        </div>
    </section>
    @endif
@endsection

<aside>
    <section id="asideBar">
        <section id="contentSide">
            @foreach($posts as $post)
                <article id="postArt">
                    <h3 id="nameBlog">{{$post->title}}</h3>
                    <p>{{$post->content}}</p>
                    <div class="postFoot">Posted by {{$post->author->name}} at {{$post->created_at}}@if(Auth::user()->id == $post->author_id || Auth::user()->admin) --- <a class="deletePost" href="{!! URL::route('deletePost', ['postId' => $post->id]) !!}">Delete</a></div>@endif
                    <hr>
                </article>
            @endforeach
        </section>
        {{$posts->links()}}
    </section>
</aside>