$( document ).ready(function() {

    //jQuery code
var dropdown = $("#dropdown"); 
var mobtn = $( "#mobtn a" );
var hide = dropdown.hide();

var open = false;
	
	mobtn.click(function(){
		
		if(open === true){
            //close menu
            $(this).css("height", $(this).height());
			dropdown.slideUp("normal");
			$(this).text('☰');
			open = false;
			console.log(open);
		}
		else{
            //open menu
            $(this).css("height", $(this).height());
			dropdown.slideDown("normal");
			$(this).text('×');
			open = true;
			console.log(open);
		}
	})


    //bij veranderen van oriëntatie menu sluiten
window.addEventListener("orientationchange", function() {
dropdown.slideUp(500);
mobtn.text('☰');
open = false;
});
});