@extends('layouts.main')


@section('content')

    <p>Upload</p>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file-upload" class="custom-file-upload">Custom Upload</label>
        <input id="file-upload" type="file" name="image"/>
        <br><br>
        <label for="submit" class="custom-submit">Submit</label>
        <input id="submit" type="submit"/>
    </form>

@endsection