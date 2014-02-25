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
	    

});


