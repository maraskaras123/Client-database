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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="scripts/clickRow.js"></script>
	</head>
	<body>
		<p class="main-logout">
			<a href='createClient.php' style='margin-right: 4.5%;'><button style="background: #3DBBFF;">create client</button></a>
			<a href='createVisit.php'><button style="background: #3DBBFF;">create visit</button></a>
			<a href='logout.php' style='margin-left: 4.5%;'><button>logout</button></a>
		</p>
		<div style="overflow-x:auto;">
			<table class="visit">
				<thead>
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Date</th>
						<th>Number</th>
					</tr>
				</thead>
				<tbody>
					<tr id="0"><td>Rasa</td><td>Maroziene</td><td>2016-09-17</td><td>+37065599996</td></tr>
					<tr id="1"><td>Arnas</td><td>Marozas</td><td>2016-10-01</td><td>+37064794814</td></tr>
					<tr id="2"><td>Jurijus</td><td>Marozas</td><td>2016-12-21</td><td>+37064400063</td></tr>
				</tbody>
			</table>
		</div>
	</body>
</html>