$(document).ready(function() {
	$('.header-box1__href').click(function(){
    var url = $(this).attr('href');
    $('.registration').load(url + ' .block-registration-enter');
    return false;
    });
})