//Teil-Laden Kalender
function openCalender(idName) {
    var i;
    var x = document.getElementsByClassName("fachrichtung");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(idName).style.display = "block";
}


//map
var mapCanvas = document.getElementById("map");
var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2),
    zoom: 10
}
var map = new google.maps.Map(mapCanvas, mapOptions);



//tabs
function rudrSwitchTab(rudr_tab_id, rudr_tab_content) {
    // first of all we get all tab content blocks (I think the best way to get them by class names)
    var x = document.getElementsByClassName("fachrichtung");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'none'; // hide all tab content
    }
    document.getElementById(rudr_tab_content).style.display = 'block'; // display the content of the tab we need

    // now we get all tab menu items by class names (use the next code only if you need to highlight current tab)
    var x = document.getElementsByClassName("tab");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].className = 'tab';
    }
    document.getElementById(rudr_tab_id).className = 'tab active';
}





//accordions
function accordions() {
    var acc = document.getElementsByClassName("kalenderbox");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
}





//termin abmelden bestätigen
function termin_abmelden(){
    var bestaetigung  = document.getElementsByClassName("termin_bestaetigen");
    var formular  = document.getElementsByClassName("termin");

    if(bestaetigung.style.display == "none"){
        bestaetigung.style.display = "block";
    }else {
        bestaetigung.style.display = "none";
    }


    if(formular.style.display == "block"){
        formular.style.display = "none";
    }else {
        formular.style.display = "block";
    }
}