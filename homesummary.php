<?php
	include("connect.php");
	$select = new mysqli($servername, $username, $password, $dbname);
	if ($select->connect_error) {
		die("Connection failed: " . $select->connect_error);
	}
	
	
	$sql = "select CAST(IFNULL(SUM(CASE WHEN TransType in (3,4,5,6) THEN amount END),0)/100 as DECIMAL(7,2)) as total_fines	From transactions t;";
	$sql .=	"select CAST(IFNULL(SUM(CASE WHEN TransType in (2) THEN amount END),0)/100 as DECIMAL(7,2)) as fines_paid From transactions t;";
	$sql .=	"SELECT CAST(IFNULL(SUM(balance),0)/100 as DECIMAL(7,2)) as prepaid_fines from player_balance where balance <0;";
	$sql .=	"SELECT CAST(IFNULL(SUM(beers_sales),0) as DECIMAL(7,2)) as beers from drinks ;";
	$total_fines = "";
	$fines_paid = "";
	$prepaid_fines = "";
	$beers ="";
	if (mysqli_multi_query($select, $sql)) {
		do {
			/* store first result set */
			
			if ($result = mysqli_store_result($select)) {
				while ($row = mysqli_fetch_row($result)) {
					if (empty($beers)) {
						if(empty($prepaid_fines)){
							if(empty($fines_paid)){
								if (empty($total_fines)) {
									$total_fines = $row[0];
								}else {
									$fines_paid = $row[0];
								}
								
							} else {
								$prepaid_fines = $row[0];
							}}else {
							$beers = $row[0];
						}
					}
						
					//printf("%s\n", $row[0]);
				}
				mysqli_free_result($result);
			}
		} while (mysqli_more_results($select) && mysqli_next_result($select));
	} 
	if (empty($total_fines)) {
		$total_fines = 0;
	}
	if (empty($prepaid_fines)) {
		$prepaid_fines = 0;
	}
	if (empty($fines_paid)) {
		$fines_paid = 0;
	}
	$fines_paid = $fines_paid * -1;
	$prepaid_fines = $prepaid_fines * -1;
	echo "<div style=\"width: 100%; text-align: center\">
		<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-success\"><strong>MONIES</strong></span> </div>
	</div>";
	echo "<table><colgroup>
	   <col style=\"width: 20%;\">
	   <col style=\"width: 20%;\">
	   <col style=\"width: 20%;\">
	    <col style=\"width: 20%;\">
	   </colgroup><tr style=\"background-color:transparent; border-radius: 1em\"><th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\"> Total Fines</span></th>
	   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\"> Fines Paid</span></th>
	   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\"> Prepaid</span></th>
	   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\"> Beer Sales</span></th></tr>
	   <tr style=\"background-color:transparent\"  align=\"center\"><td><strong> <span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\"> R ".$total_fines."</span> </strong></td>
	   <td><strong><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\"> R ".$fines_paid ."</span></strong></td>
	   <td><strong><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\"> R ".$prepaid_fines."</span></strong></td>
	   <td><strong><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\"> R ".$beers."</span></strong>
	   </td></tr></table>";
	
	mysqli_close($select);
					
?>