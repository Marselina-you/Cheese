$(document).ready(function() {
	$('.header-box1__padding a').click(function(){
    var url = $(this).attr('href');
    $('.registration').load(url + ' .block-registration-enter');
    return false;
    });
})