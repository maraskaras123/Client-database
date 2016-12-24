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
		<p class="main-logout" align="right"><a href='logout.php'><button>logout</button></a></p>
		<div style="overflow-x:auto;">
			<table class="visit">
				<thead>
					<tr>
						<th>Vardas</th>
						<th>Pavarde</th>
						<th>Data</th>
						<th>Produktas/kiekis</th>
						<th>Kaina</th>
					</tr>
				</thead>
				<tbody>
					<tr id="0">
						<td>Rasa</td>
						<td>Maroziene</td>
						<td>2016-09-17</td>
						<td>3/1.5</td>
						<td>100€</td>
					</tr>
					<tr id="1">
						<td>Arnas</td>
						<td>Marozas</td>
						<td>2016-10-1</td>
						<td>2/0.5</td>
						<td>50€</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>