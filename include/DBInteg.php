<?php
    require_once("db.php");
    
    $main_query = "SELECT visit_id, person_id, date FROM visits";
    $person_query = "SELECT name, surname, number FROM clients WHERE client_id = \"";
    $name_query = "SELECT client_id, name, surname, number FROM clients WHERE name = \"";
    $surname_query = "SELECT client_id, name, surname, number FROM clients WHERE surname = \"";
    $name_surname_query = "SELECT client_id, name, surname, number FROM clients WHERE name = \"!\" AND surname = \"?\"";
    $visit_query = "SELECT visit_id, date FROM visits WHERE person_id = \"";
    $client_query = "SELECT client_id, name, surname, number FROM clients";
    $date_query = "SELECT visit_id, person_id, date FROM visits WHERE date = \"";
    $visitID_query = "SELECT visit_id, person_id, date, type, amount, currency, price, remarks, before_count, after_count FROM visits WHERE visit_id = \"";
    $clientID_query = "SELECT client_id, name, surname, birth, sex, number, remarks FROM clients WHERE client_id = \"";

    function getAllVisits($main_query, $person_query){
        $main_result = DB::$db->query($main_query);
        while($row = $main_result->fetch_assoc()){
		    $id = $row['person_id'];
		    $person_result = DB::$db->query($person_query . $id . "\"");
    	    $person = $person_result->fetch_assoc();
		    echo ("<tr id=\"" . $row['visit_id'] . "\"><td>" . $person['name'] . "</td><td>" . $person['surname'] . "</td><td>" . $row['date'] . "</td><td>" . $person['number'] . "</td></tr>");
	    }
    }
    function getVisitsByName($name_query, $visit_query, $name){
        $name_result = DB::$db->query($name_query . $name . "\"");
		while($row = $name_result->fetch_assoc()){
			$visit_result = DB::$db->query($visit_query . $row['client_id'] . "\"");
			$visit = $visit_result->fetch_assoc();
			echo ("<tr id=\"" . $visit['visit_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $visit['date'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitsByNameAndSurname($name_surname_query, $visit_query, $name, $surname){
        $query = str_replace("!", $name, $name_surname_query);
        $query = str_replace("?", $surname, $query);
        $name_surname_result = DB::$db->query($query);
		while($row = $name_surname_result->fetch_assoc()){
			$visit_result = DB::$db->query($visit_query . $row['client_id'] . "\"");
			$visit = $visit_result->fetch_assoc();
			echo ("<tr id=\"" . $visit['visit_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $visit['date'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitsBySurname($surname_query, $visit_query, $surname){
        $surname_result = DB::$db->query($surname_query . $surname . "\"");
		while($row = $surname_result->fetch_assoc()){
			$visit_result = DB::$db->query($visit_query . $row['client_id'] . "\"");
			$visit = $visit_result->fetch_assoc();
			echo ("<tr id=\"" . $visit['visit_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $visit['date'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitsByDate($date_query, $person_query, $date){
        $date = date("Y-m-d", strtotime($date));
        $date_result = DB::$db->query($date_query . $date . "\"");
		while($row = $date_result->fetch_assoc()){
			$person_result = DB::$db->query($person_query . $row['person_id'] . "\"");
			$person = $person_result->fetch_assoc();
			echo ("<tr id=\"" . $row['visit_id'] . "\"><td>" . $person['name'] . "</td><td>" . $person['surname'] . "</td><td>" . $row['date'] . "</td><td>" . $person['number'] . "</td></tr>");
		}
    }
    function getAllClients($client_query){
        $client_result = DB::$db->query($client_query);
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsByName($client_query, $name){
        $client_result = DB::$db->query("{$client_query} WHERE name = \"{$name}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsBySurname($client_query, $surname){
        $client_result = DB::$db->query("{$client_query} WHERE surname = \"{$surname}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsByNameAndSurname($client_query, $name, $surname){
        $client_result = DB::$db->query("{$client_query} WHERE name = \"{$name}\" AND surname = \"{$surname}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getClientsByNumber($client_query, $number){
        $client_result = DB::$db->query("{$client_query} WHERE number = \"{$number}\"");
        while($row = $client_result->fetch_assoc()){
			echo ("<tr id=\"" . $row['client_id'] . "\"><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['number'] . "</td></tr>");
		}
    }
    function getVisitByID($visitID_query, $ID){
        $visitID_result = DB::$db->query($visitID_query . $ID . "\"");
        $visit = $visitID_result->fetch_assoc();
		return $visit;
    }
    function getClientByID($clientID_query, $ID){
        $clientID_result = DB::$db->query($clientID_query . $ID . "\"");
        $client = $clientID_result->fetch_assoc();
		return $client;
    }
?>