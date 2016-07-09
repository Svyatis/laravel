@extends('layouts.main')

@section('content')
    <div id="submitData"> <h2>Thank You !</h2> <br>
        <?php
            echo "<b>Your name is: </b>" . $_POST['name'] . "<br>";
            echo "<b>Your email is: </b>" . $_POST['email'] . "<br>";
            echo "<b>Your message is: </b>" . $_POST['message'] . "<br>";
        ?>
    </div>
@endsection
