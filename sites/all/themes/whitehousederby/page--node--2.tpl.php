<?php

require("candidates.php");

?>

<div id="track">

<?php


$votes_query = "SELECT data as name, COUNT(data) as votes FROM {webform_submitted_data} WHERE cid = 1 GROUP BY data ORDER BY votes DESC;";
$vote_results = db_query($votes_query);

$i = 0;

foreach($vote_results as $vote) {

	$candidateName = trim($vote->name);
	$candidateVotes = $vote->votes;
	
	foreach($candidates as $candidate => $candidateData) {
	
		if($candidateName === $candidate){
						
				$horseImage = $candidateData['horse'];
				$candidateImage = $candidateData['image'];
				$candidateFullname = $candidateData['fullname'];
					
				break;
		}	
	}
	
	print "<div class='lane'>";
	print "<div class='candidate'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/candidate/" . $candidateImage . ".jpg' /><div class='fullname'>" . $candidateFullname . "</div></div>";
	print "<div class='horseArea'><div class='colorbar'></div><img src='" . $base_path . "sites/all/themes/whitehousederby/images/horses/" . $horseImage . ".png' data-position=" . $candidateVotes . " /></div>";
	print "<div class='finish'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/whitehouse.jpg' /></div></div><div class='spacer'></div>";
	
	if($i++ == 9) { 
		break;
	}	
}

?>

</div>