<?PHP
    require_once("DB.php");
    
    $result = $db->query("SHOW TABLE STATUS LIKE 'visits'");
    $data = $result->fetch_assoc();
    $next_increment = $data['Auto_increment'];

    $date = date("Y-m-d", strtotime($_POST['date']));

    $currBeforeCount = 0;
    foreach ($_FILES['before']['name'] as $f => $name) {
		$curr_path = "../photos/" . $next_increment . "_before_" . $currBeforeCount . "." . pathinfo($name,PATHINFO_EXTENSION);
        if(move_uploaded_file($_FILES["before"]["tmp_name"][$f], $curr_path)) {
			echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			$currBeforeCount++; // Number of successfully uploaded file
		}
	}
    $currAfterCount = 0;
    foreach ($_FILES['after']['name'] as $f => $name) {
		$curr_path = "../photos/" . $next_increment . "_after_" . $currAfterCount . "." . pathinfo($name,PATHINFO_EXTENSION);
	    if(move_uploaded_file($_FILES["after"]["tmp_name"][$f], $curr_path)) {
			echo "The file ". $name . " has been uploaded as " . $curr_path . "</br>";
			$currAfterCount++; // Number of successfully uploaded file
		}
	}

    $beforeCount = $currBeforeCount;
    $afterCount = $currAfterCount;

    $query = "INSERT INTO visits (person_id, date, type, amount, price, remarks, before_count, after_count) VALUES ".
    "('".$_POST['person'].
    "', '". $date.
    "', '". $_POST['type'].
    "', '". $_POST['amount'].
    "', '". $_POST['currency'].$_POST['price'].
    "', '". $_POST['remarks'].
    "', ". $beforeCount.
    ", ". $afterCount.
    ")";

    if ($db->query($query) === TRUE) {
        echo "New record created successfully";
        sleep(1);
        header('Location: ../main.php'); 
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

    $db->close();
?>