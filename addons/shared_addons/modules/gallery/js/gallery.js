jQuery(document).ready(function ($){
    var galleries = $('section.photos .gallery-container'),
        isDesktop = ($(window).width() >= 980),
        notDesktop = !isDesktop,
        isPhone = ($(window).width() <= 767),
        notPhone = !isPhone,
        isTablet = (notPhone && notDesktop),
        notTablet = !isTablet;

    if (galleries.length > 0) {
        if (notPhone) {
            galleries.each(function(){
                var $this = $(this);

                $this.imagesLoaded(function(){
                    $this.masonry({
                        itemSelector: '.item',
                        isAnimated: true,
                        appendCallback: false
                    });
                });
            });
        }
    }
});