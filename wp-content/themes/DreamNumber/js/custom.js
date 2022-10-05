jQuery(document).ready(function () {
    // countdown
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;
    let countDown = new Date('Sep 30, 2020 00:00:00').getTime(),
        x = setInterval(function () {

            let now = new Date().getTime(),
                distance = countDown - now;
            //alert( Math.floor((distance % (day)) / (hour)));

            var i;
            for (i = 0; i < 8; i++) {
                //document.getElementsByClassName('hours')[i].innerHTML = Math.floor((distance % (day)) / (hour)),
                // document.getElementsByClassName('minutes')[i].innerHTML = Math.floor((distance % (hour)) / (minute)),
                // document.getElementsByClassName('seconds')[i].innerHTML = Math.floor((distance % (minute)) / second);
            }
        }, second)

    // crousel

    // jQuery('.owl-slide').owlCarousel({
    //     loop: true,
    //     nav: true,
    //     dots: false,
    //     items: 1,
    //     autoplay: true,
    //     mouseDrag: false,
    //     smartSpeed: 800
    // })
    // jQuery(".owl-slide .owl-prev").html('<i class="las la-arrow-left"></i>');
    // jQuery(".owl-slide .owl-next").html('<i class="las la-arrow-right"></i>');

    // // vedio-popup
    // jQuery('.popup-youtube').magnificPopup({
    //     disableOn: 700,
    //     type: 'iframe',
    //     mainClass: 'mfp-fade',
    //     removalDelay: 160,
    //     preloader: false,
    //     infinite: true,
    //     fixedContentPos: true
    // });
});