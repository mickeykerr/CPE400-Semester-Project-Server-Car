<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>

<?php
if(isset($_POST["up"])) {
  shell_exec('/home/raspberry/ledtest.py up > /dev/null 2>/dev/null &');
}
if(isset($_POST["left"])) {
  shell_exec('/home/raspberry/ledtest.py left > /dev/null 2>/dev/null &');
}
if(isset($_POST["right"])) {
  $result=shell_exec('/home/raspberry/ledtest.py right > /dev/null 2>/dev/null &');
}
if(isset($_POST["down"])) {
  shell_exec('/home/raspberry/ledtest.py down > /dev/null 2>/dev/null &');
}
?>

    <header>
        <h1>Car Controller</h1>
        <form id="controller-form">

        </form>
    </header>

    <main>

        <style>
            .dpad {float: left;}
            .dpad section {width: 50%; float: left;}
        </style>
        <section class="dpad">
            <h2>Car Direction</h2>
            <form method="POST">
            <div>
                <input 
                type="button"
                id="up-button" 
                value="^"
                name="up">
            </div>
            <div>
                <input 
                type="button" 
                id="left-button"
                value="<"
                name="left">
                
                <input type="button" 
                id="right-button"
                value=">"
                name="right">
            </div>
            <div>
                <input 
                type="button"
                id="down-button" 
                value="v"
                name="down">
            </div>
            
            <div>
                <span class = "light-label">Light</span>
            </div>
            <div>     
                <label class="switch">
                    <input type="checkbox" id="togBtn">
                    <div class="slider round">
                     <span class="on">ON</span>
                     <span class="off">OFF</span>
                    </div>
                   </label>
            </div>
</form>

        </section>
        <section class="video-feed">
            <div>
                <span class = "video-label">Video Feed</span>
            </div>
            <div>
                <iframe src="http://71.93.65.129:8000/stream.mjpg" height="480" width="640">
                </iframe> 
            </div>
        </section>

    </main>


</body>
</html>
