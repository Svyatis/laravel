<head>
    <title>NAV</title>
    <style>
        body {
            background-image:url("1.jpg");
            background-size:1366px 768px;
            background-repeat:repeat-y;
        }

        form {
            margin:90 100px;
            padding: 10px 10px;
            max-width:270px;
            background:linear-gradient(rgba(204,0,0,0.1) 225%, rgba(154,0,0,0.1) 25%, rgba(154,0,0,0.1) 50%, rgba(154,0,0,0.1) 50%);
            border-radius:50px;
        }
        input[type="file"] {
            display:none;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            margin:0 20px;
            padding: 6px 12px;
            cursor: pointer;
            color:white;
            width:200px;
            border-radius:20px;
        }
        input[type="submit"] {
            display:none;
        }
        .custom-submit {
            border: 1px solid #ccc;
            display: inline-block;
            margin:0 20px;
            padding: 6px 12px;
            cursor: pointer;
            color:white;
            width:200px;
            border-radius:20px;
        }
        p {
            color:white;
            font-size:18px;
        }
        #clock {
            background:linear-gradient(rgba(204,0,0,0.1) 225%, rgba(154,0,0,0.1) 25%, rgba(154,0,0,0.1) 50%, rgba(154,0,0,0.1) 50%);
            margin:0 200px;
            font-size:20px;
            color:white;
            width:150px;
        }
    </style>
</head>
<body>


<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="file-upload" class="custom-file-upload">Custom Upload</label>
    <input id="file-upload" type="file" name="image"/>
    <br><br>
    <label for="submit" class="custom-submit">Submit</label>
    <input id="submit" type="submit"/>
</form>

<div id="clock" name="clock">
    <span class="hour"></span>
    :
    <span class="min"></span>
    :
    <span class="sec"></span>
</div>
<script>
    var timerId;

    function update() {
        var clock = document.getElementById('clock');
        var date = new Date();

        var hours = date.getHours();
        if (hours < 10) hours = '0' + hours;
        clock.children[0].innerHTML = hours;

        var minutes = date.getMinutes();
        if (minutes < 10) minutes = '0' + minutes;
        clock.children[1].innerHTML = minutes;

        var seconds = date.getSeconds();
        if (seconds < 10) seconds = '0' + seconds;
        clock.children[2].innerHTML = seconds;
    }

    function clockStart() {
        setInterval(update, 1000);
        update(); // <--  начать тут же, не ждать 1 секунду пока setInterval сработает
    }

    clockStart();

</script>


</p>