<?PHP
    require_once("db.php");
    $entry = DB::$db->query("SELECT before_count, after_count FROM visits WHERE visit_id = {$_POST['visit']}")->fetch_assoc();
    $currBeforeCount = $entry['before_count'];
    foreach ($_FILES['before']['name'] as $f => $name) {
		$curr_path = "../photos/" . $_POST['visit'] . "_before_" . $currBeforeCount . ".jpg";
        if(move_uploaded_file($_FILES["before"]["tmp_name"][$f], $curr_path)) {
			echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			$currBeforeCount++; // Number of successfully uploaded file
		}
	}
    $before_query = "UPDATE visits SET before_count = {$currBeforeCount} WHERE visit_id = {$_POST['visit']}";
    DB::$db->query($before_query);
    $currAfterCount = $entry['after_count'];
    foreach ($_FILES['after']['name'] as $f => $name) {
		$curr_path = "../photos/" . $_POST['visit'] . "_after_" . $currAfterCount . ".jpg";
	    if(move_uploaded_file($_FILES["after"]["tmp_name"][$f], $curr_path)) {
		    echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
		    $currAfterCount++; // Number of successfully uploaded file
		}
	}
    $after_query = "UPDATE visits SET after_count = {$currAfterCount} WHERE visit_id = {$_POST['visit']}";
    DB::$db->query($after_query);
    header("Location: ../visit.php?id={$_POST['visit']}"); 
    exit();
?>