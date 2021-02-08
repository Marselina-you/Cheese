$(document).ready(function() {
	$('.header-box1__href').click(function(){
    var url = $(this).attr('href');
    $('.registration').load(url + ' .block-registration-enter');
    return false;

    });
    




    $('.quickView').click(function(){
    $(".wrap-modal").fadeIn(1000);
    var url = $(this).attr('href');
    $('.wrap-modal').load(url + ' .view-content__quick');
    return false;
});
$(".close").click(function(){
        $(".wrap-modal").hide();
    });














       

$(".wrap-for").hide();
$('.title_menu_item__onas').click(function(){
	$(".wrap-for").fadeIn(1000);
});
$('.icon-close').click(function(){
	$(".wrap-for").hide();
});




})