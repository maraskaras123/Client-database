<?PHP
require_once("./include/membersite_config.php");
if(isset($_POST['submitted'])){
   if($fgmembersite->Login()){
        $fgmembersite->RedirectToURL("main.php");
   }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="style/style.css"/>
    </head>
    <body>
        <div class="login-page">
			<div class="form">
				<form class="login-form">
					<input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" />
					<input type='password' name='password' id='password' maxlength="50" />
					<input type='submit' name='Submit' value='Submit' />
					<button>login</button>
			</div>
		</div>
    </body>
</html>
