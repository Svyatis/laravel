@extends('layouts.main')

@section('content')
    <?php
    $displayForm = true;
    if (Session::has('message')){
        $displayForm = false;
    }
    if($displayForm){
    ?>
    {{ Form::open(['route' => 'contact_store', 'class' => 'form']) }}
    <div class="form-group">
        {{ Form::label(trans('main.YourName')) }}
        <br>
        {{ Form::text('name', null,
           ['required',
            'class'=>'form-control',
            'placeholder'=>trans('main.YourName')]) }}
    </div>
    <br>
    <div class="form-group">
        {{ Form::label(trans('main.YourEmail')) }}
        <br>
        {{ Form::text('email', null,
            ['required',
                  'class'=>'form-control',
                  'placeholder'=>trans('main.YourEmail')]) }}
    </div>
    <br>
    <div class="form-group">
        {{ Form::label(trans('main.YourMessage')) }}
        <br>
        {{ Form::textarea('message', null,
            ['required',
                  'class'=>'textareaClass',
                  'cols'=>'30',
                  'rows'=>'5',
                  'placeholder'=>trans('main.YourMessage')]) }}
    </div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <br>
    <div class="form-group">
        {{ Form::submit(trans('main.ContactUs'),
          ['class'=>'btn']) }}
    </div>
    {{ Form::close() }}
    <?php
    }
    ?>

@endsection