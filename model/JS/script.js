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

function hideShowElement(source, target) {
    element = document.getElementById(target);
    element.style.display = (source.checked)
        ? 'block'
        : 'none';
}


//XML Tabelle sortieren


function table_sort() {
    const styleSheet = document.createElement('style')
    styleSheet.innerHTML = `
      .order-inactive span {
          visibility:hidden;
      }
      .order-inactive:hover span {
          visibility:visible;
      }
      .order-active span {
          visibility: visible;
      }
  `
    document.head.appendChild(styleSheet)

    document.querySelectorAll('th.order').forEach(th_elem => {
        let asc = true
        const span_elem = document.createElement('span')
        span_elem.style = "font-size:0.8rem; margin-left:0.5rem"
        span_elem.innerHTML = "▼"
        th_elem.appendChild(span_elem)
        th_elem.classList.add('order-inactive')

        const index = Array.from(th_elem.parentNode.children).indexOf(th_elem)
        th_elem.addEventListener('click', (e) => {
            document.querySelectorAll('th.order').forEach(elem => {
                elem.classList.remove('order-active')
                elem.classList.add('order-inactive')
            })
            th_elem.classList.remove('order-inactive')
            th_elem.classList.add('order-active')

            if (!asc) {
                th_elem.querySelector('span').innerHTML = '▲'
            } else {
                th_elem.querySelector('span').innerHTML = '▼'
            }
            const arr = Array.from(th_elem.closest("table").querySelectorAll('tbody tr'))
            arr.sort((a, b) => {
                const a_val = a.children[index].innerText
                const b_val = b.children[index].innerText
                return (asc) ? a_val.localeCompare(b_val) : b_val.localeCompare(a_val)
            })
            arr.forEach(elem => {
                th_elem.closest("table").querySelector("tbody").appendChild(elem)
            })
            asc = !asc
        })
    })
}


$(function() {
    $(".exportToExcel").click(function(e){
        var table = $(this).prev('.table2excel');
        if(table && table.length){
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: preserveColors
            });
        }
    });
    
});