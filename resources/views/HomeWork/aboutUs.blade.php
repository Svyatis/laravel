@extends('layouts.main')


@section('content')

        <p>{{ trans('main.About Us') }}</p>
    {{ trans('main.AboutUsText') }}

@endsection

@section('aside')

    <div class="imageDiv">
        <input class="images" type="image" src="{{ asset("images/3.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/4.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/5.jpg") }}">
        <br>
        <input class="images" type="image" src="{{ asset("images/6.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/7.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/8.jpg") }}">
        <br>
        <input class="images" type="image" src="{{ asset("images/1.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/2.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/9.jpg") }}">
    </div>

@endsection