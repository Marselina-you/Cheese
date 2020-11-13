$(document).ready(function() {
	$('.header-box1__href').click(function(){
    var url = $(this).attr('href');
    $('.registration').load(url + ' .block-registration-enter');
    return false;
    });
    

$('.title_menu_item').click(function() { /* выбираем класс icon-menu и
               добавляем метод click с функцией, вызываемой при клике */

        $('.wrap-for').animate({ //выбираем класс menu и метод animate

            right: '275px' /* теперь при клике по иконке, меню, скрытое за
               левой границей на 285px, изменит свое положение на 0px и станет видимым */

        }, 600); //скорость движения меню в мс
        
        $('body').animate({ //выбираем тег body и метод animate

            right: '1600px' /* чтобы всё содержимое также сдвигалось вправо
               при открытии меню, установим ему положение 285px */

        }, 600); //скорость движения меню в мс
    });    
 
/* Закрытие меню */

    $('.icon-close').click(function() { //выбираем класс icon-close и метод click

        $('.wrap-for').animate({ //выбираем класс menu и метод animate

            right: '-1600px' /* при клике на крестик меню вернется назад в свое
               положение и скроется */

        }, 600); //скорость движения меню в мс
        
    $('body').animate({ //выбираем тег body и метод animate

            right: '0px' //а содержимое страницы снова вернется в положение 0px

        }, 600); //скорость движения меню в мс
    });



})