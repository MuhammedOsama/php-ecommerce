$(document).ready(function () {

    /*Banner Owl Carousel*/
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1,
    });

    /*Top Sale Owl Carousel*/
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });

    /*Isotope Filter*/
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
    });

    /*Filter Items On Button Click*/
    $(".button-group").on("click", "button", function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    });

    /*New Phones Owl Carousel*/
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });

    /*Blogs Owl Carousel*/
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
        },
    });

    /*Product QTY Section*/
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");

    /*Click On QTY Up Button*/
    $qty_up.click(function () {
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);

        if ($input.val() >= 1 && $input.val() <= 9) {
            $input.val(function (i, oldVal) {
                return ++oldVal;
            });
        }
    });

    /*Click On QTY Down Button*/
    $qty_down.click(function () {
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);

        if ($input.val() > 1 && $input.val() <= 10) {
            $input.val(function (i, oldVal) {
                return --oldVal;
            });
        }
    });
});
