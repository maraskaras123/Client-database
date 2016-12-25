<?PHP
    $db = new mysqli('mysql.hostinger.lt', 'u357666557_user', 'gedas69tevas', 'u357666557_yolo') or die ("Cant connect");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    $query = "INSERT INTO clients (name, surname, birth, sex, number, remarks) VALUES ".
    "('".$_POST['name'].
    "', '". $_POST['surname'].
    "', '". $_POST['date'].
    "', '". $_POST['sex'].
    "', '". $_POST['country'].$_POST['number'].
    "', '". $_POST['remarks']."')";

    if ($db->query($query) === TRUE) {
        echo "New record created successfully";
        sleep(1);
        header('Location: ../main.php'); exit();
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

    $db->close();
?>