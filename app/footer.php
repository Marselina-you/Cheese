<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
	<link rel="stylesheet" href="css/app.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>header1</title>
</head>
<body>
	 <div class="container-fluid footer-container backgroud5">
	     	<div class="footer-box1">
				<div class="wrap-footer-box-1">          
				    <div class="footer-box1__caption greencolor justify-content-center"><h2 class="text-center">Контакты</h2></div>
				    <div class="footer-box1__caption-content size24px justify-content-center">
				    	<div class="justify-content-center browncolor text-center">ООО"Леткино"</div>
				    	<div class="justify-content-center browncolor text-center">
				    		Калязинский район, д.Леткино, стр.2</div>
				    </div>
				    <div class="footer-box1__caption-phone justify-content-center size24px text-center">+7 <span class="greencolor ">495 679 45 45</span></div>
				</div>
			</div>
			<div class="footer-box2 col-lg-12 size26px">
		    	<div class="footer-box2__caption text-center text-white justify-content-center"><h2>Напишите нам!</h2></div>
		   
		        <form action="" method="post"  class="footer-box2_form col-lg-12">
		    	<div class="input-wrap">
                    <input type="text" name="name" placeholder="*Имя" class="footer-box2__input col-lg-6 offset-lg-3 col-sm-12"/>
                </div>
                <div class="input-wrap">
                    <input type="text" name="email" placeholder="*E-mail" class="footer-box2__input col-lg-6 offset-lg-3 col-sm-12"/>
                </div>
                <div class="input-wrap">
                   <input type="text" name="tema" placeholder="*Тема" class="footer-box2__input col-lg-6 offset-lg-3 col-sm-12"/>
                </div>
                <div class="input-wrap">
                    <textarea type="text" name="letter" placeholder="*Ваше сообщение" class="footer-box2__input  col-lg-6 offset-lg-3 col-sm-12"></textarea>
                </div>
                <div class="submit-wrap d-flex justify-content-center">
                    <input type="submit" value="отправить" name ="submit" class="btn btn-dark"/>
                </div>
                </form></div>
                <div class="footer-box3 align-items-center d-flex justify-content-center col-lg-12">
		    	<div class="footer-box3_name col-lg-2 offset-lg-1 col-md-6 col-sm-6 d-flex justify-content-center"><div class="footer-box3_name">Alferova@studio2020</div></div>
		    	<div class="footer-box3-social d-flex col-lg-2 offset-lg-6 col-md-6 col-sm-6 justify-content-center">
		    		<div class="footer-box3-social__icon"><img src="images/dest/face.png" alt=""></div>
		    		<div class="footer-box3-social__icon"><img src="images/dest/vk.png" alt=""></div>
		    		<div class="footer-box3-social__icon"><img src="images/dest/twit.png" alt=""></div>
		    		<div class="footer-box3-social__icon"><img src="images/dest/what.png" alt=""></div>
		    	</div>
		    </div>
		
        </div>
        
        <?php
$name = $_POST['name'];
$email = $_POST['email'];
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$name = urldecode($name);
$email = urldecode($email);
$name = trim($name);
$email = trim($email);
//echo $fio;
//echo "<br>";
//echo $email;
if (mail("marselina88@list.ru", "Заявка с сайта", "ФИО:".$name.". E-mail: ".$email ,"From: marselina88@list.ru \r\n"))
 {     
} else {
    echo "при отправке сообщения возникли ошибки";
}?>
    </body>
</html>

