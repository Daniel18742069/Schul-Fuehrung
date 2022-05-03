//Teil-Laden Kalender
function openCalender(idName) {
    var i;
    var x = document.getElementsByClassName("fachrichtung");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "block";
    }
    document.getElementById(idName).style.display = "none";
}

/*map
var mapCanvas = document.getElementById("map");
var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2),
    zoom: 10
}
var map = new google.maps.Map(mapCanvas, mapOptions);*/



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

function aendereStatusFuehrung(offenerTag) {
    window.alert(offenerTag);
    var xhttp;
    try {
        xhttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return;
            }
        }
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("GenResult").innerHTML = this.responseText + "<br>";
            console.log(responseText);
        }
    };
    xhttp.open("POST", "model/aktualisieren.php");
    formData = new FormData();
    formData.append("offenerTag", offenerTag); // add some extra post variables
    xhttp.send(formData);
}




//accordions

function accordion() {

    var accordion = function() {

        var $accordion = $('.js-accordion');
        var $accordion_header = $accordion.find('.js-accordion-header');
        var $accordion_item = $('.js-accordion-item');

        // default settings 
        var settings = {
            // animation speed
            speed: 300,

            // close all other accordion items if true
            oneOpen: false
        };


        return {
            // pass configurable object literal
            init: function($settings) {
                $accordion_header.on('click', function() {
                    accordion.toggle($(this));
                });

                $.extend(settings, $settings);

                // ensure only one accordion is active if oneOpen is true
                if (settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                    $('.js-accordion-item.active:not(:first)').removeClass('active');
                }

                // reveal the active accordion bodies
                $('.js-accordion-item.active').find('> .js-accordion-body').show();
            },
            toggle: function($this) {

                if (settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                    $this.closest('.js-accordion').
                    find('> .js-accordion-item').
                    removeClass('active').
                    find('.js-accordion-body').
                    slideUp();
                }

                // show/hide the clicked accordion item
                $this.closest('.js-accordion-item').toggleClass('active');
                $this.next().stop().slideToggle(settings.speed);
            }
        };

    }();

    $(document).ready(function() {
        accordion.init({
            speed: 300,
            oneOpen: true
        });
    });
}

function hideShowElement(source, target) {
    element = document.getElementById(target);
    element.style.display = (source.checked) ?
        'block' :
        'none';
}