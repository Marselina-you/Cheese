<!DOCTYPE html>
<html>
<head>
	<title>Главная страница</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.min.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php 
	 require_once('startsession.php');
 $dbc = mysqli_connect('localhost','root','root', 'letkino');
	$query = "SELECT name FROM mytable WHERE user_id = '" . $_SESSION['user_id'] . "'";
  $data = mysqli_query($dbc, $query);
	 $row = mysqli_fetch_array($data);
	  if ($row != NULL) {
      $login = $row['login'];
      $name = $row['name'];
    }
     mysqli_close($dbc); 
  
$logout ='';
$logout1 ='выйти';
	$name_message = 'личный кабинет';
$str = $name;
if (isset($_SESSION['user_id'])) {
	$name_message = sprintf($str);
	$logout = sprintf($logout1);
}

  ?>
	<div class="container-fluid undertitle-container">
	<div class="row header-box1 backgroud5">
			<div class="header-box1_number  col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3 d-flex align-items-center">
				<div class="header_icon"><a href=""><img src="images/dest/phone.png"  alt=""/></a></div>
                <div class="greencolor"><a href="" class="greencolor">+7(960)490-78-90</a></div>
			</div>
			<div class="header-box1_email col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3 d-flex align-items-center">
				<div class="header_icon"><a href="" class=""><img src="images/dest/email.png"  alt=""/></a></div>
				<div class=""><a href="" class="greencolor">cheese@letkino.ru</a></div>
			</div>
			
			<div class="header-box1_icons col-xl-5 offset-xl-3 col-lg-6 offset-lg-2  
			 col-md-6 col-sm-6 col-xs-4 d-flex align-items-center justify-content-between">

                <div class="header_icon col-xl-1"><a href="index.php" class="header-box1__hr"><img src="images/dest/houm.png"  alt=""/></a></div>

				<div class="header_icon  col-xl-1 d-flex justify-content-center"><a href="basket.php" class="header-box1__href"><img src="images/dest/basket.png"  alt=""/></a></div>
				
				<div class="header_icon__enter d-flex align-items-center  col-xl-5 col-lg-6">
				<div class="header_icon"><a href="enter.php" class="header-box1__href"><img src="images/dest/g8lack.png"  alt=""/></a></div>
				<div class="greencolor"><?php echo '<a href="enter.php" class="col-xl-1 header-box1__href greencolor">' . $name_message . '</a>'; ?></a></div>
			   <div class="header-box1__enter d-flex align-items-center flex-column justify-content-center backgroud5">
			    	<div class="header-box1__padding">Войдите, чтобы совершать</br>покупки</div><a href="enter.php" class="header-box1__href size14px">Войти или зарегистрироваться</a></div>
			    </div>
				
				
				<div class="header_icon col-xl-1 d-flex justify-content-center"><?php echo '<a href="enter.php" class="greencolor">' . $logout . '</a>'; ?></div>
				<div class="d-flex align-items-center justify-content-end col-xl-3">
				<a href=""><div class="header_icon"><img src="images/dest/face.png"   alt=""/></div></a>
				<a href=""><div class="header_icon"><img src="images/dest/vk.png"   alt=""/></div></a>
				<a href=""><div class="header_icon"><img src="images/dest/twit.png"    alt=""/></div></a>
				<a href=""><div class="header_icon"><img src="images/dest/what.png"   alt=""/></div></a>
			    </div>

		</div>
	</div>
	
	<div class="registration d-flex justify-content-center col-lg-12">
		
	</div>
	</div>
<script src="js/app.min.js"></script>
<script src="js/editprofile.js"></script>

</body>
</html>