$(document).ready(function(){
    $(".slider").owlCarousel({
        loop: true,
        nav: true,
        items: 1
    });

    $(".find-us__videos").owlCarousel({
        loop: true,
        nav: true,
        responsive : {

            0: {
                items: 1,
                margin: 0,
            },

            800: {
                items: 1,
                margin: -100,
                stagePadding: 100,
                dots: true,
                nav: false,
            },

            1200: {
                items: 1,
            margin: -60,
            stagePadding: 100,
            dots: false,
            }
        }
    });

    $(".partners__slider").owlCarousel({
        loop: true,
        nav: true,
        items: 4,
        dots: false,
        responsive: {

            0: {
                items: 1,
                arrows: false,
                dots: true
            },

            800: {
                items: 2
            },

            1000: {
                items: 3
            },

            1400: {
                items: 4
            }
        }
    })
})