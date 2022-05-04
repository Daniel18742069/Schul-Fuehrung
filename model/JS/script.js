//Tabs

function tabs(button, fachrichung_id) {
    accordion = document.getElementById("accordion");
    button.style.border = '1px solid black';
    button.style.fontWeight = '700';
    button.style.filter = 'brightness(0.7)';
    //console.log(button.checked);
    accordion.style.display = (button.active)
        ? 'none'
        : 'block';

    fuehrungen = document.getElementsByClassName('fuehrung');
    for (fuehrung in fuehrungen) {
        // hide all
        fuehrung.style.display = 'none';
    }

    fuehrungen = document.getElementsByClassName(fachrichung_id);
    for (fuehrung in fuehrungen) {
        // show all
        fuehrung.style.display = 'block';
    }
}




//accordions

function accordion() {

    var accordion = function () {

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
    element.style.display = (source.checked)
        ? 'block'
        : 'none';
}
