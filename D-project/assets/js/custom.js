  WebFontConfig = {
    google: { families: [ 'Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

(function($){
  $(document).ready(function(){
    
    //slides hide show img
    $('.slides img:gt(0)').hide();
    setInterval(function(){
        $('.slides :first-child').fadeOut(1000)
           .next('img').fadeIn(1000)
           .end().appendTo('.slides')
       },4000)

    // goto top
    $('.goto-top').click(function(){
        $("body, html").animate({
            scrollTop: "0px"
        });
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 150) {
            $('.goto-top').fadeIn();
        } else {
            $('.goto-top').fadeOut();
        }
    });

    $('a[href^="#"]').click(function(e){
      e.preventDefault();
    })
  })
})(jQuery);