@extends('layouts.main')


@section('content')
    <p>{{ trans('main.Upload') }}</p>
    @if(Session::has('success'))
        <h2>{{ Session::get('success') }}</h2>
    @endif
    {{ Form::open(['url'=>'apply/upload','method'=>'POST', 'files'=>true]) }}
    <div class="form-group">
        {{ Form::label(trans('main.EnterProductName')) }}
        <br>
        {{ Form::text('name', null, ['placeholder'=>trans('main.EnterProductName')]) }}
    </div>
    <div class="form-group">
        {{ Form::label(trans('main.EnterProductDescription')) }}
        <br>
        {{ Form::textarea('description', null,
            ['class'=>'textareaClass',
             'placeholder'=>trans('main.EnterProductDescription')]) }}
    </div>
        {{ Form::file('image', ['id'=>'file-upload']) }}
        <label for="file-upload" class="custom-file-upload">{{ trans('main.ChooseFile') }}</label>
        <p class="errors">{{$errors->first('image')}}</p>
        @if(Session::has('error'))
            <p class="errors">{{ Session::get('error') }}</p>
        @endif
    {{ Form::submit(trans('main.Submit'), ['class'=>'btn']) }}
    {{ Form::close() }}
    <hr>
    {{ Form::open() }}
    <h1>Search by Manufactors:</h1>
    <br>
    <div class="checkbox">
        <input type="checkbox" class="input-assumpte" name="manufactors[]" id="1">
        <label for="1" class="tag">Tokyo Inc.</label>
    </div>
    <br>
    <div class="checkbox">
        <input type="checkbox" class="input-assumpte" name="manufactors[]" id="2">
        <label for="2" class="tag">New York Inc.</label>
    </div>
    <br>
    <div class="checkbox">
        <input type="checkbox" class="input-assumpte" name="manufactors[]" id="3">
        <label for="3" class="tag">Paris Inc.</label>
    </div>
    {{ Form::submit(trans('main.Search'), ['class'=>'btn']) }}
    {{ Form::close() }}
@endsection
@section('aside')
    @if(isset($products))
    <?php
    echo "<table class='productsTable'>";
    $cols = 5;
    $k = 0;
    for ($i = 0; $i < count($products); $i++) {
        if ($k % $cols == 0) echo "<tr>";
        echo "<td>";
        $referencePath = URL::route('products', ['id' => $products[$i]->id]);
        $path = $products[$i]->image;
        $name = $products[$i]->name;
        echo "<a href='$referencePath'>";
        echo "<img src='$path' alt='prodImg' width='100' />";
        echo "</a>";
        echo "<h2>$name</h2>";
        echo "</td>";
        if ((($k + 1) % $cols == 0) || (($i + 1) == count($products))) echo "</tr>";
        $k++;
    }
    echo "</table>";
    ?>
    @endif
    @if(isset($productDetail))
        <input type="image" src="{{ asset("$productDetail->image") }}">
        <br>
        <h1 class="productName">{{  $productDetail->name }}</h1>
        <h2 class="productDescription">{{  $productDetail->description }}</h2>
        <h1 style="color: red">Manufactors:</h1>
        @foreach($productDetail->manufactors as $manufactor)
        <h3 class="productDescription">{{  $manufactor->name }}</h3>
        @endforeach
    @endif
@endsection