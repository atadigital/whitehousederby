<?php

require("candidates.php");

?>

<div id="track">

<?php

$i = 0;

foreach($candidates as $candidate => $candidateData) {
	
	$query = "SELECT data FROM {webform_submitted_data} WHERE data = '$candidate'";
	
	$voteCount = db_query($query);
	
	$number_of_rows = $voteCount->rowCount();
	
	//print($number_of_rows);

	print "<div class='lane'>";
	print "<div class='candidate'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/candidate/" . $candidateData['image'] . ".jpg' /><div class='fullname'>" . $candidateData['fullname'] . "</div></div>";
	print "<div class='horseArea'><div class='colorbar'></div><img src='" . $base_path . "sites/all/themes/whitehousederby/images/horses/" . $candidateData['horse'] . ".png' data-position=" . $number_of_rows . " /></div>";
	print "<div class='finish'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/whitehouse.jpg' /></div></div><div class='spacer'></div>";

	//Limit to 10 showing
	//if($i++ == 9) { break; }
}
?>

</div>