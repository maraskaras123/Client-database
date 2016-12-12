<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("http://belekas.esy.es");
    exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Upload Photos</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
	<body>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload:
    			<input type="file" name="files[]" id="fileToUpload" multiple="multiple" accept="image/*">
    			<input type="submit" value="Upload" name="submit">
		</form>

	</body>
</html>