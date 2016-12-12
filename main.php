<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<title>main</title>
	</head>
	<body>
		hello!
		<p><a href='logout.php'>Logout</a></p>
	</body>
</html>