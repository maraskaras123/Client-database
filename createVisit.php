<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>
<DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/Form.css" />
		<title>visit info</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="scripts/userPick.js"></script>
    </head>
    <body>
        <div id="picker">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
            <table class="visit">
				<thead>
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Date</th>
						<th>Number</th>
					</tr>
				</thead>
				<tbody>
					<tr id="0"><td>Rasa</td><td>Maroziene</td><td>2016-09-17</td><td>+37065599996</td></tr>
					<tr id="1"><td>Arnas</td><td>Marozas</td><td>2016-10-01</td><td>+37064794814</td></tr>
					<tr id="2"><td>Jurijus</td><td>Marozas</td><td>2016-12-21</td><td>+37064400063</td></tr>
				</tbody>
			</table>
        </div>
        <div id="main" style="display:none;">
            <form action="include/VisitInteg.php" method="post" enctype="multipart/form-data">
                <input type='hidden' name='person' id='person' />
                <ul class="form-style-1">
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
                            <option value="€">€</option>
                            <option value="£">£</option>
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