import 'jquery';

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

const scroll = {
    init() {
        console.log('init scroll');
        this.section = getUrlParameter('section');
        
        console.log($('body.home').length)
        if (this.section) {
            console.log('section')
            $([document.documentElement, document.body]).animate({
                scrollTop: $('#'+this.section).height(),
            }, 1000);
        }

        else {
            console.log($('body.home').length == 0)
            if ($('body.home').length == 0) {
                setTimeout(() => {
                    const scroll = $(window).scrollTop();

                    if (scroll == 0) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $('.hero ').height() + 40,
                        }, 1000);
                    }
                }, 1000)
            }
        }

    },
}

export default scroll;