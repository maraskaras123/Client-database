<?PHP
require_once("./include/membersite_config.php");
if(isset($_POST['submitted'])){
   if($fgmembersite->Login())
        $fgmembersite->RedirectToURL("main.php");
}
if($fgmembersite->CheckLogin()){
    $fgmembersite->RedirectToURL("main.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
	<body>
		<div class="login-page">
			<form class="form" action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
				<div class='container'>
					<label for='username' >UserName:</label><br/>
					<input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
					<span id='login_username_errorloc' class='error'></span>
				</div>
				<div class='container'>
					<label for='password' >Password:</label><br/>
					<input type='password' name='password' id='password' maxlength="50" /><br/>
					<span id='login_password_errorloc' class='error'></span>
				</div>
				<div class='container'>
					<input type='submit' name='Submit' value='Login' />
				</div>
			</form>
		</div>
	</body>
</html>