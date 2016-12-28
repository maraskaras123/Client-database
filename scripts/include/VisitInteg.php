<?PHP
    require_once("DB.php");
    
    $result = $db->query("SHOW TABLE STATUS LIKE 'visits'");
    $data = $result->fetch_assoc();
    $next_increment = $data['Auto_increment'];

    $date = date("Y-m-d", strtotime($_POST['date']));

    if (!empty($_POST['date'])){
        $currBeforeCount = 0;
        foreach ($_FILES['before']['name'] as $f => $name) {
		    $curr_path = "../photos/" . $next_increment . "_before_" . $currBeforeCount . ".jpg";
            if(move_uploaded_file($_FILES["before"]["tmp_name"][$f], $curr_path)) {
			    echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			    $currBeforeCount++; // Number of successfully uploaded file
		    }
	    }
        $currAfterCount = 0;
        foreach ($_FILES['after']['name'] as $f => $name) {
		    $curr_path = "../photos/" . $next_increment . "_after_" . $currAfterCount . ".jpg";
	        if(move_uploaded_file($_FILES["after"]["tmp_name"][$f], $curr_path)) {
			    echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			    $currAfterCount++; // Number of successfully uploaded file
		    }
	    }
    }

    $beforeCount = $currBeforeCount;
    $afterCount = $currAfterCount;

    if(isset($_POST['person'])){
        $query = "INSERT INTO visits (person_id, date, type, amount, price, remarks, before_count, after_count) VALUES ".
        "('".$_POST['person'].
        "', '". $date.
        "', '". $_POST['type'].
        "', '". $_POST['amount'].
        "', '". $_POST['currency'].$_POST['price'].
        "', '". $_POST['remarks'].
        "', '". $beforeCount.
        "', '". $afterCount.
        "')";

        if ($db->query($query) === TRUE) {
            echo "New record created successfully";
            sleep(1);
            header('Location: ../main.php'); 
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $db->error;
        }
    }
    if (!empty($_POST['type'])){
        $currBeforeCount = 0;
        foreach ($_FILES['before']['name'] as $f => $name) {
		    $curr_path = "../photos/" . $_POST['visit'] . "_before_" . $currBeforeCount . ".jpg";
            if(move_uploaded_file($_FILES["before"]["tmp_name"][$f], $curr_path)) {
			    echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			    $currBeforeCount++; // Number of successfully uploaded file
		    }
	    }
        $currAfterCount = 0;
        foreach ($_FILES['after']['name'] as $f => $name) {
		    $curr_path = "../photos/" . $_POST['visit'] . "_after_" . $currAfterCount . ".jpg";
	        if(move_uploaded_file($_FILES["after"]["tmp_name"][$f], $curr_path)) {
			    echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			    $currAfterCount++; // Number of successfully uploaded file
		    }
	    }
        $beforeCount = $currBeforeCount;
        $afterCount = $currAfterCount;
        if ($_POST['type'] == 'before'){
            $before_query = "UPDATE visits SET before_count = {$beforeCount} WHERE visit_id = {$_POST['visit']}";
            $db->query($before_query);
            header("Location: ../visit.php?id={$_POST['visit']}"); 
            exit();
        }
        if ($_POST['type'] == 'after'){
            $after_query = "UPDATE visits SET after_count = {$afterCount} WHERE visit_id = {$_POST['visit']}";
            $db->query($after_query);
            header("Location: ../visit.php?id={$_POST['visit']}"); 
            exit();
        }
    }
?>