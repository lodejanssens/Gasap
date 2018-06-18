$(document).ready(function () {

//Begroeting
var uren = new Date().getHours();
var bericht;
var ochtend = ('Goede morgen!');
var afternoon = ('Goede middag!');
var avond = ('Goede avond!');

if (uren >= 0 && uren < 12) {
    bericht = ochtend;

} else if (uren >= 12 && uren < 17) {
    bericht = afternoon;

} else if (uren >= 17 && uren < 24) {
    bericht = avond;
}
$('.greeting').append(bericht);

});