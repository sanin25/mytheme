jQuery(document).ready(function($) {

    var controller = new ScrollMagic.Controller();


    jQuery.fn.exist = function() {
        return $(this).length;

    }
    function setHeiHeight() {
        $('.heigh').css({
            height: $(window).height() + 'px'
        });
    }



    setHeiHeight(); // устанавливаем высоту окна при первой загрузке страницы

    $(window).resize(setHeiHeight);

    /*Конец высоты*/

    $(".headerslider").bxSlider({
        mode: 'fade',
        captions: true,
        controls:true,
        auto:true
    });


});