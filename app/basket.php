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
  require_once('undertitle.php');
if (!isset($_SESSION['user_id'])) {
  ?>
    <div class="container-fluid wrap-block-basket block-registration-enter">
	    <div class="block-basket col-lg-12">
	    	<div class="col-lg-6 block-update-profile__title fontTahoma size26px darkbrowncolor">Kорзина пуста</div>
	    	<div class="block-basket__proposal d-flex">
	    	    <div class="col-lg-6 block-update-profile____item darkbrowncolor fontTahoma size20px">Если в корзине были товары &nbsp;–&nbsp; </div>
                <div class="col-lg-6 block-update-profile____item darkbrowncolor fontTahoma size20px"><a href="enter.php">войдите</a></div>
                <div class="col-lg-6 block-update-profile____item darkbrowncolor fontTahoma size20px">, чтобы посмотреть список.</div>
            </div>
	    </div>
    </div>
    <?php 
}
$dbc = mysqli_connect('localhost','root','root', 'letkino');
	$query = "SELECT name FROM mytable WHERE user_id = '" . $_SESSION['user_id'] . "'";
  $data = mysqli_query($dbc, $query);
	 $row = mysqli_fetch_array($data);
	  if ($row != NULL) {
      $login = $row['login'];
      $name = $row['name'];
    }
     mysqli_close($dbc);
	echo' 
  <div class="container-fluid wrap-block-basket block-registration-enter">
	    <div class="block-basket col-lg-12">
	    	<div class="col-lg-6 block-update-profile__title fontTahoma size26px darkbrowncolor">Kорзина пуста</div>';
	    	 echo'<div class="col-lg-6 block-update-profile____item darkbrowncolor fontTahoma size20px">Добро пожаловать, ' .$name. '! </div>
	    	 <div class="col-lg-6 block-update-profile____item darkbrowncolor fontTahoma size20px"><a href="logout.php">Выйти</a></div>
	    	</div>
	    </div>';
require_once('footer.php'); 
?>
<script src="js/app.min.js"></script>
</body>
</html>