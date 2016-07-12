@extends('layouts.main')


@section('content')

    <p>Upload</p>
    <div class="about-section">
        <div class="text-content">
            <div class="span7 offset1">
                @if(Session::has('success'))
                    <div class="alert-box success">
                        <h2>{{ Session::get('success') }}</h2>
                    </div>
                @endif
                <div class="secure"></div>
                {{ Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) }}
                <div class="control-group">
                    <div class="controls">
                        {{ Form::file('image', array('id'=>'file-upload')) }}
                        <label for="file-upload" class="custom-file-upload">Custom Upload</label>
                        <p class="errors">{!!$errors->first('image')!!}</p>
                        @if(Session::has('error'))
                            <p class="errors">{{ Session::get('error') }}</p>
                        @endif
                    </div>
                </div>
                <div id="success"> </div>
                {{ Form::submit('Submit', array('class'=>'btn')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection