<?PHP
require_once("./include/membersite_config.php");
if(isset($_POST['submitted'])){
   if($fgmembersite->Login()){
        $fgmembersite->RedirectToURL("login-home.php");
   }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
      <title>Membership Website Sample</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css"/>
    </head>
    <body>
        <div class="login-page">
			<div class="form">
				<form class="login-form">
					<input type="text" placeholder="username"/>
					<input type="password" placeholder="password"/>
					<button>login</button>
			</div>
		</div>
    </body>
</html>
