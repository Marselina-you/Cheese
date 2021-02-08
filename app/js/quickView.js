$(document).ready(function() {
	$('.quickView').click(function(){
    var url = $(this).attr('href');
    $('.wrap-modal').load(url + ' .modal-content');
    return false;

    });
})