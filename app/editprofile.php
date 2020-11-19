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
	<?php
  require_once('startsession.php');
  require_once('undertitle.php');
$dbc = mysqli_connect('localhost','root','root','letkino');
if (isset($_POST['submit'])) {
    // Захватите данные профиля из POST
    
    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
    $phone = mysqli_real_escape_string($dbc, trim($_POST['phone']));
    $login = mysqli_real_escape_string($dbc, trim($_POST['login']));

if (!empty($name) && !empty($phone) && !empty($login) ) {
     	$query = "UPDATE mytable SET name = '$name', phone = '$phone', login = '$login' WHERE user_id = '" . $_SESSION['user_id'] . "'";
        mysqli_query($dbc, $query);
echo '<div class="container-fluid backgroud2"><div class="block-update-profile col-lg-12"><div class="col-lg-6 block-update-profile__title fontTahoma size26px darkbrowncolor">Ваш профиль был успешно обновлен.</div>';
$query = "SELECT name, phone, login FROM mytable WHERE user_id = '" . $_SESSION['user_id'] . "'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 1) {
    // Пользовательская строка была найдена, поэтому отобразите данные пользователя
    $row = mysqli_fetch_array($data);
echo'<div class="block-update-profile-data col-lg-6"><div class="d-flex"><div class="block-update-profile-data__item size20px fontTahoma darkbrowncolor col-lg-5">Имя: </div><div class="size20px fontTahoma greencolor col-lg-5">' . $row['name'] . '</div></div>';
echo'<div class="d-flex"><div class="block-update-profile-data__item size20px fontTahoma darkbrowncolor col-lg-5">Телефон:</div><div class="size20px fontTahoma greencolor col-lg-5">' . $row['phone'] . '</div></div>';
echo'<div class="d-flex"><div class="block-update-profile-data__item size20px fontTahoma darkbrowncolor col-lg-5">Логин:</div><div class="size20px fontTahoma greencolor col-lg-5">' . $row['login'] . '</div></div>';


}


 echo '<div class="block-update-profile-data__item size20px fontTahoma greencolor col-lg-5"><a href="index.php">на главную </a></div></div></div>';
        mysqli_close($dbc);
        exit();
    }
     else {
        echo '<p class="error">Вы должны ввести все данные профиля.</p>';
      }
    }
    else {
    // Возьмите данные профиля из базы данных
    $query = "SELECT name, phone, login FROM mytable WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
      $name = $row['name'];
      $phone = $row['phone'];
      $login = $row['login'];
      
    }
    else {
      echo '<p class="error">Возникла проблема с доступом к вашему профилю.</p>';
    }
  }

  mysqli_close($dbc);
  ?>
	<div class="container-fluid"><div class="wrap-registration-form col-lg-12"><form enctype="multipart/form-data" method="post" class="registration-form col-lg-6 offset-lg-3 backgroud1" action="">
	
	  <div class="registration-form-block-input d-flex col-lg-8 offset-lg-2 justify-content-between align-items-center"><div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="user_name">Имя:</label></div>
      <div class="registration-form-block-input__input col-lg-6"><input type="text" class="col-lg-12" name="name" value="<?php if (!empty($name)) echo $name; ?>"/></div></div>
      <div class="registration-form-block-input d-flex col-lg-8 offset-lg-2 justify-content-between align-items-center">
		    		<div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="user_phone">Телефон:</label></div>
		    		<div class="registration-form-block-input__input col-lg-6">
		    			<input type="text" class="col-lg-12" name="phone" value="<?php if (!empty($phone)) echo $phone; ?>"></div>
		    	</div>
	<div class="registration-form-block-input d-flex col-lg-8 offset-lg-2 justify-content-between align-items-center">
		    		<div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="login">Логин:</label></div>
		    		<div class="registration-form-block-input__input col-lg-6">
		    			<input type="text" class="col-lg-12" name="login"  value="<?php if (!empty($login)) echo $login; ?>"></div>
		    	</div>
		    	
      
      <div class="registration-form-block-input__submit d-flex col-lg-8 offset-lg-2 justify-content-end"><div class=""><input type="submit" value="Сохранить" name="submit" class="col-lg-12 btn btn-dark"/></div></div></form>
  </div></div>
	<script src="js/app.min.js"></script>
<?php
require_once('footer.php');
?>
</body>
</html>