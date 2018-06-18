$(document).ready(function(){

    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
      $('#slideshow > div:first')
        .fadeOut(3000)              // Fadeout tijd
        .next()
        .fadeIn(3000)               // Fadein tijd
        .end()
        .appendTo('#slideshow');
    }, 9000);                       // 
    
    $("#slideshow2 > div:gt(0)").hide();

// 2de slideshow settings

    setInterval(function () {
        $('#slideshow2 > div:first')
            .fadeOut(3000)              // Fadeout tijd
            .next()
            .fadeIn(3000)               // Fadein tijd
            .end()
            .appendTo('#slideshow2');
    }, 6000);                       // Tijd

  });


