(function($){$(document).on('keydown.twentyfifteen',function(e){var url=false;if(e.which===37){url=$('.nav-previous a').attr('href');}else if(e.which===39){url=$('.nav-next a').attr('href');}if(url&&(!$('textarea,input').is(':focus'))){window.location=url;}});})(jQuery);