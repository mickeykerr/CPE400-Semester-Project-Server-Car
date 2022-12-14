<!DOCTYPE html>
<!-- 	
	Frontend Done by Kyle Knotek. 
	PHP scripting done by Michael Kerr.
	2022 
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller</title>
    
    <link rel="stylesheet" href="main.css">
    
</head>

<body>


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
                type="submit"
                id="up-button" 
                value="^"
                name="up">
            </div>
            <div>
                <input 
                type="submit" 
                id="left-button"
                value="<"
                name="left">
                
                <input type="submit" 
                id="right-button"
                value=">"
                name="right">
            </div>
            
            <div>
                <span class = "light-label">Light</span>
            </div>
            <div>     
            <label class="switch">
                    <input 
                    type="submit"
                    id="on-button" 
                    value="ON"
                    name="on">
                    <input 
                    type="submit"
                    id="off-button" 
                    value="OFF"
                    name="off">
                </label>
            </div>
</form>

        </section>
        <section class="video-feed">
            <div>
                <span class = "video-label">Video Feed</span>
            </div>
            <div>
		<!-- Replace some-ip with public IP address web server is running on -->
                <iframe src="http://some-ip:8000/stream.mjpg" height="480" width="640">
                </iframe> 
            </div>
        </section>

    </main>

    
</body>

<!--
PHP script to handle POST requests from client. 
POST requests are send to the servocontrol.py script and led.py script with arguments depending on the intended functionality.
-->
<?php
//reset the servo to the center, then actuate motor
if(isset($_POST["up"])) {
  shell_exec('/var/www/html/scripts/servocontrol.py mid > /dev/null 2>/dev/null &');
}
//turns servo to left, then actuate motor
if(isset($_POST["left"])) {
  shell_exec('/var/www/html/scripts/servocontrol.py left > /dev/null 2>/dev/null &');
}
//turn servo to right, then actuate motor
if(isset($_POST["right"])) {
  $result=shell_exec('/var/www/html/scripts/servocontrol.py right > /dev/null 2>/dev/null &');
}
	
//turn on LED connected to car
if(isset($_POST["on"])) {
  shell_exec('/var/www/html/scripts/led.py ledon > /dev/null 2>/dev/null &');
}
	
//turn off LED connected to car
if(isset($_POST["off"])) {
  shell_exec('/var/www/html/scripts/led.py ledoff > /dev/null 2>/dev/null &');
}
?>
</html>
