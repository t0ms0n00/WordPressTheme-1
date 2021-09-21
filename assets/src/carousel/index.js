(function ($){

class SlickCarousel{
    constructor(){
        this.initiateCarousel();
    }

    initiateCarousel(){
        $('.main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
            pauseOnFocus: false, 
            pauseOnHover: false
        });
    }
}

new SlickCarousel();

})(jQuery)