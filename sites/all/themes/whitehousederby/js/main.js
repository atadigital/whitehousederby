jQuery(document).ready(function($){

function resizeAssets() {

    $winHeight = $(window).height();
    $winWidth = $(window).width();

    $laneHeight = ($winHeight/100)*9;
    $spacerHeight = $winHeight/100;

    $this = $(".lane");

    $this.height($laneHeight);
    
    $this.next().height($spacerHeight);

    $this.children(".candidate").width(Math.floor($laneHeight*2));
    $this.children(".horseArea").width(Math.floor($winWidth-($laneHeight*4)));
    $this.children(".finish").width(Math.floor($laneHeight*2));
    $this.children().find("img, .colorbar").height($laneHeight);
    $this.children(".candidate").find("img, .fullname").height($laneHeight).width(Math.floor($laneHeight));
}

function horsePosition() {

    //Total Votes to Win
    $totalVotes = 100;

    $winWidth = $(window).width();
    $winHeight = $(window).height();
    $laneUnit = $winHeight/10;

    $horseArea = $winWidth - ($laneUnit*4);

    $(".horseArea > img").each(function(){

        //Get number of votes per horse
        $multiplier = $(this).data("position");

        $spot = ($multiplier/$totalVotes)*$horseArea;


        $(this).prev().animate({width: $spot},"slow");

    });
}

horsePosition();
resizeAssets();
    
	$(window).resize(function(){
			 resizeAssets();
	});
	    


/* Straw Poll Form */
for (var i = 1; i < 16 ; i++) {
	
	var picName;

	 switch(i){
	      case 1:
	      	picName = "bush";
	      	picTitle = "Jeb Bush";
	      break;
	      case 2:
	      	picName = "carson";
	      	picTitle = "Ben Carson";
	      break;
	      case 3:
	      	picName = "cruz";
	      	picTitle = "Ted Cruz";
	      break;
	      case 4:
	      	picName = "jindal";
	      	picTitle = "Bobby Jindal";
	      break;
	      case 5:
	      	picName = "paul";
	      	picTitle = "Rand Paul";
	      break;
	      case 6:
	      	picName = "perry";
	      	picTitle = "Rick Perry";
	      break;
	      case 7:
	      	picName = "ryan";
	      	picTitle = "Paul Ryan";
	      break;
	      case 8:
	      	picName = "santorum";
	      	picTitle = "Rick Santorum";
	      break;
	      case 9:
	      	picName = "walker";
	      	picTitle = "Scott Walker";
	      break;
	      case 10:
	      	picName = "huckabee";
	      	picTitle = "Mike Huckabee";
	      break;
	      case 11:
	      	picName = "napolitano";
	      	picTitle = "Judge Napolitano";
	      break;
	      case 12:
	      	picName = "west";
	      	picTitle = "Allen West";
	      break;
	      case 13:
	      	picName = "demint";
	      	picTitle = "Jim DeMint";
	      break;
	      case 14:
	      	picName = "lee";
	      	picTitle = "Mike Lee";
	      break;
	      case 15:
	      	picName = "palin";
	      	picTitle = "Sarah Palin";
	      break;
	}
	
		$("body.page-node-1 #edit-submitted-candidate > div:nth-child(" + i + ") > label").html("<div class='imagewrap'><img src='http://localhost/whitehousederby/sites/all/themes/whitehousederby/images/form/candidates/" + picName + ".png' /></div>");
	
	$("#edit-submitted-candidate .form-item > label").click(function(){
	
		$("#edit-submitted-candidate .form-item > label .imagewrap").removeClass("active");
		
		$(this).find(".imagewrap").addClass("active");
			
	});
		
}

});