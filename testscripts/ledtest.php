<html>
<head>
                 <title>Python test</title>
</head>
<body>
<form action="ledtest.php" method="post">
<input name="on" type="submit" value="ON">
</form>
</body>
<?php
                 if (isset($_POST['on'])){
                echo "LED on"
		shell_exec("python /var/www/html/ledtest.py");
                 }
?>
</html>
