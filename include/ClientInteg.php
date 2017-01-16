<?PHP
    require_once("db.php");
    
    $createQuery = "INSERT INTO clients (name, surname, birth, sex, number, remarks) VALUES ".
    "('".$_POST['name'].
    "', '". $_POST['surname'].
    "', '". $_POST['date'].
    "', '". $_POST['sex'].
    "', '". $_POST['country'].$_POST['number'].
    "', '". $_POST['remarks']."')";

    if (DB::$db->query($createQuery) === TRUE) {
        echo "New record created successfully";
        sleep(1);
        header('Location: ../main.php'); exit();
    } else {
        echo "Error: " . $createQuery . "<br>" . DB::$db->error;
    }
?>