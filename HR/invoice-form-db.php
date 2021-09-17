<?php
//db connection
include('includes/config.php');


?>
<html>
	<head>
		<title>Consolidated Leave generator</title>
	</head>
	<body>
		select dates:
		<form method='get' action='invoice-db.php'>
			<DIV>
			<label for="fromdate"></label>
			<input id="sree" onchange="adddate()" name="fromdate" type="date" class='input-group date'  autocomplete="off">
			</div>

			<div class="input-field col m6 s12">
			<label for="todate"></label>
			<input  id="sree2" onchange="adddate()" name="todate" type="date" class='input-group date'  autocomplete="off">
			</DIV>

			<button type="submit" name="apply" id="apply">Generate</button>  
		
			<select name='invoiceID'>
				<?php
					//show invoices list as options
					$query = mysqli_query($con,"select * from invoice");
					while($invoice = mysqli_fetch_array($query)){
						echo "<option value='".$invoice['invoiceID']."'>".$invoice['invoiceID']."</option>";
					}
				?>
			</select>
			<input type='submit' value='Generate'>
		</form>
	</body>
</html>
