$(document).ready(function() {
	$('header_icon__enter').click(function(){
    var url = $(this).attr('href');
    $('.registration').load(url + ' .block-registration-enter');
    return false;
    });
    


$(".wrap-for").hide();
$('.title_menu_item__onas').click(function(){
	$(".wrap-for").fadeIn(1000);
});
$('.icon-close').click(function(){
	$(".wrap-for").hide();
});
})