<?php

require("candidates.php");

?>

<div id="track">

<?php

$i = 0;

$candidateVotes = 20;

foreach($candidates as $candidate => $candidateData) {
	
	
	$voteCount = db_query("SELECT * FROM {webform_submitted_data} WHERE data = 'bush'");
	
	$number_of_rows = $voteCount->rowCount();
	
	print($number_of_rows);

	print "<div class='lane'>";
	print "<div class='candidate'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/candidate/" . $candidateData['image'] . ".jpg' /><div class='fullname'>" . $candidateData['fullname'] . "</div></div>";
	print "<div class='horseArea'><div class='colorbar'></div><img src='" . $base_path . "sites/all/themes/whitehousederby/images/horses/" . $candidateData['horse'] . ".png' data-position=" . $candidateVotes . " /></div>";
	print "<div class='finish'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/whitehouse.jpg' /></div></div><div class='spacer'></div>";

	//Limit to 10 showing
	if($i++ == 9) { break; }
}
?>

</div>