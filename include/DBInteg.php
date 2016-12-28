<?php
    require_once("DB.php");
    
    $main_query = "SELECT visit_id, person_id, date FROM visits";
    $person_query = "SELECT name, surname, number FROM clients WHERE client_id = \"";
    $name_query = "SELECT client_id, name, surname, number FROM clients WHERE name = \"";
    $surname_query = "SELECT client_id, name, surname, number FROM clients WHERE surname = \"";
    $name_surname_query = "SELECT client_id, name, surname, number FROM clients WHERE name = \"!\" AND surname = \"?\"";
    $visit_query = "SELECT visit_id, date FROM visits WHERE person_id = \"";
    $client_query = "SELECT client_id, name, surname, number FROM clients";
    $date_query = "SELECT visit_id, person_id, date FROM visits WHERE date = \"";

    function getAllVisits($db, $main_query, $person_query){
        $main_result = $db->query($main_query);
        while($row = $main_result->fetch_assoc()){
		    $id = $row['person_id'];
		    $person_result = $db->query($person_query . $id . "\"");
    	    $person = $person_result->fetch_assoc();
		    echo ("<tr id=\"" . $row['visit_id'] . "\"><td>" . $person['name'] . "</td><td>" . $person['surname'] . "</td><td>" . $row['date'] . "</td><td>" . $person['number'] . "</td></tr>");
	    }
    }
    function getVisitsByName($db, $name_query, $visit_query, $name){
        $name_result = $db->query($name_query . $name . "\"");
		while($row = $name_result->fetch_assoc()){
			$visit_result = $db->query($visit_query . $row['client_id'] . "\"");
			$visit = $visit_result->fetch_assoc();
			echo ("<tr id=\"" . $visit['visit_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $visit['date'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitsByNameAndSurname($db, $name_surname_query, $visit_query, $name, $surname){
        $query = str_replace("!", $name, $name_surname_query);
        $query = str_replace("?", $surname, $query);
        $name_surname_result = $db->query($query);
		while($row = $name_surname_result->fetch_assoc()){
			$visit_result = $db->query($visit_query . $row['client_id'] . "\"");
			$visit = $visit_result->fetch_assoc();
			echo ("<tr id=\"" . $visit['visit_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $visit['date'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitsBySurname($db, $surname_query, $visit_query, $surname){
        $surname_result = $db->query($surname_query . $surname . "\"");
		while($row = $surname_result->fetch_assoc()){
			$visit_result = $db->query($visit_query . $row['client_id'] . "\"");
			$visit = $visit_result->fetch_assoc();
			echo ("<tr id=\"" . $visit['visit_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $visit['date'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitsByDate($db, $date_query, $person_query, $date){
        $date = date("Y-m-d", strtotime($date));
        $date_result = $db->query($date_query . $date . "\"");
		while($row = $date_result->fetch_assoc()){
			$person_result = $db->query($person_query . $row['person_id'] . "\"");
			$person = $person_result->fetch_assoc();
			echo ("<tr id=\"" . $row['visit_id'] . "\"><td>" . $person['name'] . "</td><td>" . $person['surname'] . "</td><td>" . $row['date'] . "</td><td>" . $person['number'] . "</td></tr>");
		}
    }
    function getAllClients($db, $client_query){
        $client_result = $db->query($client_query);
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsByName($db, $client_query, $name){
        $client_result = $db->query("{$client_query} WHERE name = \"{$name}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsBySurname($db, $client_query, $surname){
        $client_result = $db->query("{$client_query} WHERE surname = \"{$surname}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsByNameAndSurname($db, $client_query, $name, $surname){
        $client_result = $db->query("{$client_query} WHERE name = \"{$name}\" AND surname = \"{$surname}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsByNumber($db, $client_query, $number){
        $client_result = $db->query("{$client_query} WHERE number = \"{$number}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
?>