$(document).ready(function() {
	$(".cheese-text-none").hide();
$(".minySize").click(function(){
 $(this).next().slideToggle();
 var text = $("span",this).text();
 $("span",this).text(text != "+" ? "+" : "\u2013")
});
})