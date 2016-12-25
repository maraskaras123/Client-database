<?PHP
require_once("./include/membersite_config.php");
$fgmembersite->LogOut();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<title>Logged out</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
	<body>
		<div class='form'>
			<h2>You have logged out</h2>
			<p class='logout'><a href='http://belekas.esy.es'><button>Login Again</button></a></p>
		</div>
	</body>
</html>