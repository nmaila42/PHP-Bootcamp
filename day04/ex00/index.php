<html>
<head>
    <title>login page</title>
    </head>
    <body>
		<?php
		session_start();
			if ($_GET['submit'] == 'OK')
			{
				$_SESSION['login'] = $_GET['login'];
				$_SESSION['passwd'] = $_GET['passwd'];
			}
			echo '<form  method="get" action="index.php">';
			echo 'username <input type="text" value="'.$_SESSION['login'].'" name="login" /> <br />';
			echo 'password <input type="password" value="'.$_SESSION['passwd'].'" name="passwd" /> <br />';
			echo '<input type="submit" value="OK" name="submit" />';
		echo '</form>';
		?>
    </body>
</html>