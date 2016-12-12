<?php
date_default_timezone_set('Europe/Vilnius');
$date = date('Y_m_d_H_i_s');
$target_dir = "photos/";
$new_path = $target_dir . $date . "_";
$count = 0;

if(isset($_POST["submit"])) {
	foreach ($_FILES['files']['name'] as $f => $name) {
		$curr_path = $new_path . $count . "." . pathinfo($name,PATHINFO_EXTENSION);
	    if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $curr_path)) {
			echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			$count++; // Number of successfully uploaded file
		}
	}
}
?>