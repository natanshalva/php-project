$(document).ready(function() {
	// This is more like it!

	// alert("ok");

	//$("#main").hide();
	//$("body").fadeIn(2000);

	$("h1").click(function() {
		$("#main").css("border" , "solid 3px red");
		return false;
	});
	
	$("h1").toggle(
      function () {
       $("#main").css("border" , "solid 3px red");
       
      },
      function () {
       $("#main").css("border" , "solid 3px blue");
      }
    );
	
	
	
}); // end of file 
