<?PHP
require_once("include/membersite_config.php");
require_once("include/DBInteg.php");
require_once("include/db.php");
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
		<link rel="stylesheet" type="text/css" href="style/Form.css" />
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
		<form action="main.php" method="post">
			<ul class="form-style-1" style="width: 100%;">
				<li style="display: inline;"><input type="text" name="name" class="field-quater" placeholder="Name" /></li>
				<li style="display: inline;"><input type="text" name="surname" class="field-quater" placeholder="Surname" /></li>
				<li style="display: inline;"><input type="date" name="date" class="field-quater" placeholder="Date" /></li>
				<li style="display: inline;"><input type="submit" value="Submit" name="submit" class="field-quater"></li>
			</ul>
		</form>
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
						if (!empty($_POST['name']) && !empty($_POST['surname']))
							getVisitsByNameAndSurname($name_surname_query, $visit_query, $_POST['name'], $_POST['surname']);
						else if(!empty($_POST['name']))
							getVisitsByName($name_query, $visit_query, $_POST['name']);
						else if (!empty($_POST['surname'])){
							getVisitsBySurname($surname_query, $visit_query, $_POST['surname']);
						}
						else if (!empty($_POST['date']))
							getVisitsByDate($date_query, $person_query, $_POST['date']);
						else
							getAllVisits($main_query, $person_query);
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>