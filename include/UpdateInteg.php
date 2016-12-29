<?PHP
    require_once("DB.php");
    $currBeforeCount = 0;
    foreach ($_FILES['before']['name'] as $f => $name) {
		$curr_path = "../photos/" . $_POST['visit'] . "_before_" . $currBeforeCount . ".jpg";
        if(move_uploaded_file($_FILES["before"]["tmp_name"][$f], $curr_path)) {
			echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
            $before_query = "UPDATE visits SET before_count = {$beforeCount} WHERE visit_id = {$_POST['visit']}";
            $db->query($before_query);
			$currBeforeCount++; // Number of successfully uploaded file
		}
	}
    $currAfterCount = 0;
    foreach ($_FILES['after']['name'] as $f => $name) {
		$curr_path = "../photos/" . $_POST['visit'] . "_after_" . $currAfterCount . ".jpg";
	    if(move_uploaded_file($_FILES["after"]["tmp_name"][$f], $curr_path)) {
		    echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
            $after_query = "UPDATE visits SET after_count = {$afterCount} WHERE visit_id = {$_POST['visit']}";
        $db->query($after_query);
		    $currAfterCount++; // Number of successfully uploaded file
		}
	}
    $beforeCount = $currBeforeCount;
    $afterCount = $currAfterCount;
    if ($beforeCount > 0){
        $before_query = "UPDATE visits SET before_count = {$beforeCount} WHERE visit_id = {$_POST['visit']}";
        $db->query($before_query);
    }
    if ($afterCount > 0){
        $after_query = "UPDATE visits SET after_count = {$afterCount} WHERE visit_id = {$_POST['visit']}";
        $db->query($after_query);
        
    }
    header("Location: ../visit.php?id={$_POST['visit']}"); 
    exit();
?>