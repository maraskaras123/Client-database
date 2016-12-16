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
		<p class="button" align="right"><a href='logout.php'><button>logout</button></a></p>
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
					<tr>
						<td>Rasa</td>
						<td>Maroziene</td>
						<td>2016-09-17</td>
						<td>3/1.5</td>
						<td>100€</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>