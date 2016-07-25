@extends('layouts.main')


@section('content')
@if(Auth::check() && Auth::user()->admin)
    <p>{{ trans('main.Upload') }}</p>
    @if(Session::has('success'))
        <h2>{{ Session::get('success') }}</h2>
    @endif
    {{ Form::open(['url'=>'upload','method'=>'POST', 'files'=>true]) }}
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
    <h1>Manufacturer:</h1><br>
    <div class="checkbox">
        <input name="manufactors[]" value="1" type="checkbox" class="input-assumption" id="Tokyo">
        <label for="Tokyo" class="tag">Tokyo Inc.</label>
    </div><br>
    <div class="checkbox">
        <input name="manufactors[]" value="3" type="checkbox" class="input-assumption" id="Paris">
        <label for="Paris" class="tag">Paris Inc.</label>
    </div><br>
    <div class="checkbox">
        <input name="manufactors[]" value="2" type="checkbox" class="input-assumption" id="NewYork">
        <label for="NewYork" class="tag">New York Inc.</label>
    </div><br>
    <h1>Colors:</h1><br>
    <span class="checkbox">
        <input name="colors[]" value="1" type="checkbox" class="input-assumption" id="red">
        <label for="red" class="tag">red</label>
    </span>
    <span class="checkbox">
        <input name="colors[]" value="2" type="checkbox" class="input-assumption" id="blue">
        <label for="blue" class="tag">blue</label>
    </span>
    <span class="checkbox">
        <input name="colors[]" value="3" type="checkbox" class="input-assumption" id="black">
        <label for="black" class="tag">black</label>
    </span>
    <span class="checkbox">
        <input name="colors[]" value="4" type="checkbox" class="input-assumption" id="white">
        <label for="white" class="tag">white</label>
    </span>
    <span class="checkbox">
        <input name="colors[]" value="5" type="checkbox" class="input-assumption" id="green">
        <label for="green" class="tag">green</label>
    </span><br>
        {{ Form::file('image', ['id'=>'file-upload']) }}
        <label for="file-upload" class="custom-file-upload">{{ trans('main.ChooseFile') }}</label>
        <p class="errors">{{$errors->first('image')}}</p>
        @if(Session::has('error'))
            <p class="errors">{{ Session::get('error') }}</p>
        @endif
    {{ Form::submit(trans('main.Submit'), ['class'=>'btn']) }}
    {{ Form::close() }}
    <hr>
@endif
    <h1>Search options:</h1>
    -----------------------
    {{ Form::open(['url'=>'search']) }}
    <br>
    <h1>Search by Model names:</h1>
    <br>
    {{ Form::text('names', null, ['placeholder' => 'search by model names']) }}
    <br>
    <br>
    <h1>Search by Manufactors:</h1>
    <br>
    {{ Form::text('manufactors', null, ['placeholder' => 'search by manufactors']) }}
    <br>
    <br>
    <h1>Search by Colors:</h1>
    <br>
    {{ Form::text('colors', null, ['placeholder' => 'search by colors']) }}
    <br>
    {{ Form::submit(trans('main.Search'), ['class'=>'btn']) }}
    {{ Form::close() }}
@endsection
@section('aside')
    <?php
    if (isset($products)){
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
    }
    ?>
    @if(isset($productDetail))
        <input type="image" src="{{ asset("$productDetail->image") }}">
        <br>
        <h1 class="productName">{{  $productDetail->name }}</h1>
        <h2 class="productDescription">{{  $productDetail->description }}</h2>
        <h1>Manufactors:</h1>
        @foreach($productDetail->manufactors as $manufactor)
        <h3 class="productDescription">{{  $manufactor->name }}</h3>
        @endforeach
        <h1>Colors:</h1>
        @foreach($productDetail->colors as $color)
            <h3 class="productDescription">{{  $color->name }}</h3>
        @endforeach
    @endif
@endsection