<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

$db = new mysqli('mysql.hostinger.lt', 'u357666557_user', 'gedas69tevas', 'u357666557_yolo') or die ("Connection failed: " . $db->connect_error);
$main_query = "SELECT visit_id, person_id, date FROM visits";
$person_query = "SELECT name, surname, number FROM clients WHERE client_id = \"";
$main_result = $db->query($main_query);
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
					<?
						while($row = $main_result->fetch_assoc()){
							$id = $row['person_id'];
							$person_result = $db->query($person_query . $id . "\"");
    						$person = $person_result->fetch_assoc();
							echo ("<tr id=\"" . $row['visit_id'] . "\"><td>" . $person['name'] . "</td><td>" . $person['surname'] . "</td><td>" . $row['date'] . "</td><td>" . $person['number'] . "</td></tr>");
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>