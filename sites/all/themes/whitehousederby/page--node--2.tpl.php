<?php

require("candidates.php");

?>
<script>
setInterval("location.reload(true)", 30000);
</script>
<div id="track">

<?php


$votesQuery = "SELECT data as name, COUNT(data) as votes FROM {webform_submitted_data} WHERE cid = 1 GROUP BY data ORDER BY votes DESC;";
$totalsQuery = "SELECT COUNT(data) as votes from {webform_submitted_data} WHERE cid =1";

$totalVotes = db_query($totalsQuery)->fetchField();

$voteResults = db_query($votesQuery);

$i = 0;

foreach($voteResults as $vote) {

	$candidateName = trim($vote->name);
	$candidateVotes = $vote->votes;
	
	foreach($candidates as $candidate => $candidateData) {
	
		if($candidateName == $candidate){
						
				$horseImage = $candidateData['horse'];
				$candidateImage = $candidateData['image'];
				$exploder = explode(" ",$candidateData['fullname']);
				$candidateFullname = $exploder[0] . "<br>" . $exploder[1];
				$percentVote = (floor(($candidateVotes/$totalVotes)*100));
					
				break;
		}	
	}
	
	print "<div class='lane'>";
	print "<div class='candidate'><img src='" . $base_path . "sites/all/themes/whitehousederby/images/candidate/" . $candidateImage . ".jpg' /><div class='fullname'>" . $candidateFullname . "</div></div>";
	print "<div class='horseArea'><div class='colorbar'></div><img src='" . $base_path . "sites/all/themes/whitehousederby/images/horses/" . $horseImage . ".png' data-position=" . $percentVote . " /></div>";
	print "<div class='finish'>" . $percentVote . "%</div></div><div class='spacer'></div>";
	
	if($i++ == 9) { 
		break;
	}	
}

?>

</div>