<?PHP
require_once("include/membersite_config.php");
require_once("include/DBInteg.php");
require_once("include/db.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/Form.css" />
		<title>visit info</title>
        <script src="scripts/jquery-3_1_1_min.js"></script>
        <script src="scripts/userPick.js"></script>
    </head>
    <body>
        <div id="picker">
            <form action="/createVisit.php" method="post">
			    <ul class="form-style-1" style="width: 98%;">
				    <li style="display: inline;"><input type="text" name="name" class="field-quater" placeholder="Name" /></li>
				    <li style="display: inline;"><input type="text" name="surname" class="field-quater" placeholder="Surname" /></li>
				    <li style="display: inline;"><input type="text" name="number" class="field-quater" placeholder="Number" /></li>
				    <li style="display: inline;"><input type="submit" value="Submit" name="submit" class="field-quater" /></li>
			    </ul>
		    </form>
            <p class="main-logout" style="text-align: center; display: block;">
			    <a href='createClient.php'><button style="background: #3DBBFF; width: 45%; height: 31px; padding-top: 8px;">create client</button></a>
		    </p>
            <table class="visit">
				<thead>
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Number</th>
					</tr>
				</thead>
                    <?
                        if(!empty($_POST['name']) && !empty($_POST['surname']))
                            getClientsByNameAndSurname($client_query, $_POST['name'], $_POST['surname']);
                        else if(!empty($_POST['name']))
                            getClientsByName($client_query, $_POST['name']);
                        else if (!empty($_POST['surname']))
                            getClientsBySurname($client_query, $_POST['surname']);
                        else if (!empty($_POST['number']))
                            getClientsByNumber($client_query, $_POST['number']);
                        else
                            getAllClients($client_query);
                    ?>
			</table>
        </div>
        <div id="main" style="display: none;">
            <form action="include/VisitInteg.php" method="post" enctype="multipart/form-data">
                <input type='hidden' name='person' id='person' />
                <ul class="form-style-1" style="max-width: 400px;">
                    <li>
                        <label>Date of visit</label>
                        <input type="date" name="date" class="field-long" placeholder="Date" />
                    </li>
                    <li>
                        <label>Type & amount</label>
                        <input type="text" name="type" class="field-divided" placeholder="Type" />&nbsp;<input type="number" class="field-divided" step="0.01" name="amount" placeholder="Amount" />
                    </li>
                    <li>
                        <label>Price</label>
                        <select name="currency" style='width: 20%;'>
                            <option value="euros">euros</option>
                            <option value="pounds">pounds</option>
                        </select>&nbsp;<input type="number" name="price" placeholder="Price" style="width: 78.5%;" />
                    </li>
                    <li>
                        <label>Remarks</label>
                        <textarea name="remarks" id="remarks" class="field-long field-textarea" placeholder="Optional" ></textarea>
                    </li>
                    <li>
                        <label>Before photos</label>
                        <input type="file" name="before[]" multiple="multiple" accept="image/*">
                    </li>
                    <li>
                        <label>After photos</label>
                        <input type="file" name="after[]" multiple="multiple" accept="image/*">
                    </li>
                    <li>
                        <input type="submit" value="Submit" name="submit" />
                    </li>
                </ul>
            </form>
        </div>
    </body>
</html>