var modal = $('.wrap-modal');





var span = $(".close")[0];





span.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

$('.quickView').click(function(){
    var url = $(this).attr('href');
    $('.wrap-modal').load(url + ' .modal-content');
    return false;

    });