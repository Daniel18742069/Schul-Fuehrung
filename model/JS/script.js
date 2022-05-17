//Tabs
function first_tab() { // wählt die erste Fachrichtung aus
    buttons = document.getElementsByClassName('tab');
    if (buttons) buttons[0].click();
}

function tabs(actuated_button, fachrichung_id) {
    buttons = document.getElementsByClassName('tab');
    for (index = 0; buttons.length > index; index++) {
        button = buttons[index];

        if (button === actuated_button) {
            // Actuated Button
            button.disabled = true;
            button.style.border = '1px solid black';
            button.style.fontWeight = '700';
            button.style.filter = 'brightness(0.7)';
        } else {
            // Reset other Buttons
            button.disabled = false;
            button.style.border = 'none';
            button.style.fontWeight = 'normal';
            button.style.filter = 'none';
        }
    }

    fuehrungen = document.getElementsByClassName('fuehrung');
    for (index = 0; fuehrungen.length > index; index++) {
        fuehrung = fuehrungen[index];

        if (fuehrung.classList.contains(fachrichung_id)) {
            // show element
            fuehrung.style.display = 'block';
        } else {
            // hide element
            fuehrung.style.display = 'none';
        }
    }
}

function formAusgefuellt(element) {
    const parent = element.parentNode;
    const inputs = parent.getElementsByTagName('input');
    // bricht ab wenn 1+ feld leer ist
    for (let index = 0; index < inputs.length; index++) {
        if (inputs[index].value === '') return;
    }

    showHideCaptcha(true);
    parent.querySelector('input[name="submit"]').disabled = false;
}

function showHideCaptcha(anzeigen = false) {
    content = document.querySelector('#content');
    captcha_background = document.querySelector('#captcha_background');
    // Webseite Blurren/Normal
    content.style.filter = (anzeigen) ? 'blur(5px)' : '';
    // Captcha Anzeigen/Verstecken
    captcha_background.style.display = (anzeigen) ? 'block' : 'none';
}

function aendereStatusFuehrung(offenerTag) {
    window.alert(offenerTag);
    var status = document.getElementById("namenAendern" + offenerTag).innerHTML;
    console.log(status);
    if (status == "deaktiviert") {
        document.getElementById("namenAendern" + offenerTag).innerHTML = "AKTIVIERT";
    } else {
        document.getElementById("namenAendern" + offenerTag).innerHTML = "DEAKTIVIERT";
    }
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
    xhttp.open("POST", "model/aktualisieren.php");
    formData = new FormData();
    formData.append("offenerTag", offenerTag); //extra variable
    xhttp.send(formData);

}


//accordions

function accordion() {

    const accordion = function () {

        const $accordion = $('.js-accordion');
        const $accordion_header = $accordion.find('.js-accordion-header');

        // default settings 
        const settings = {
            // animation speed
            speed: 300,

            // close all other accordion items if true
            oneOpen: false
        };


        return {
            // pass configurable object literal
            init: function ($settings) {
                $accordion_header.on('click', function () {
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
            toggle: function ($this) {

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

    $(document).ready(function () {
        accordion.init({
            speed: 300,
            oneOpen: true
        });
    });
}



//Backend Führung hinzufügen
function hideShowElement(source, target) {
    element = document.getElementById(target);
    element.style.display = (source.checked) ?
        'block' :
        'none';
}