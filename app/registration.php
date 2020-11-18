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
	require_once('undertitle.php'); 
    ?>
 <div class="container-fluid"><div class="wrap-registration-form col-lg-12"><form enctype="multipart/form-data" method="post" class="registration-form col-lg-6 offset-lg-3 backgroud1" action="">
	
	  <div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center"><div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="user_name">Имя:</label></div>
      <div class="registration-form-block-input__input col-lg-6"><input type="text" class="col-lg-12" name="name"/></div></div>
      <div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center">
		    		<div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="user_phone">Телефон:</label></div>
		    		<div class="registration-form-block-input__input col-lg-6">
		    			<input type="text" class="col-lg-12" id="phone" name="phone"></div>
		    	</div>
	<div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center">
		    		<div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="login">Логин:</label></div>
		    		<div class="registration-form-block-input__input col-lg-6">
		    			<input type="text" class="col-lg-12" name="login" placeholder="используйте латинские буквы"></div>
		    	</div>
		    	<div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center">
		    	<div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor"><label for="password1" class="registr">Пароль:</label></div>
      <div class="registration-form-block-input__input col-lg-6"><input type="password"  class="col-lg-12" name="password1" /></div></div>
      <div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center">
      <div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor"><label for="password2" class="registr">Повторите пароль:</label></div>
     <div class="registration-form-block-input__input col-lg-6"> <input type="password" class="col-lg-12" name="password2" /></div></div>
      <input type="submit" value="Сохранить" name="submit" /></form>
  </div></div></body>


<<?php  

  $dbc = mysqli_connect('localhost','root','root','letkino');
    if (isset($_POST['submit'])) {
      $name= $_POST['name'];
      $phone= $_POST['phone'];
      $login = mysqli_real_escape_string($dbc, trim($_POST['login'])); 
      $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
      $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
      
 if (!empty($login)&& !empty($password1) && !empty($password2) && ($password1 == $password2)) {  
 $query = "SELECT * FROM mytable WHERE login = '$login'";
 $data = mysqli_query($dbc, $query); 
  if (mysqli_num_rows($data) == 0) {      
 $query = "INSERT INTO mytable (name, phone, login, password) VALUES ('$name', ' $phone', '$login', SHA('$password1'))";
          
           mysqli_query($dbc, $query);
           echo '<h2>Ваша новая учетная запись успешно создана. Теперь вы можете <a href="enter.php">войти</a>.</h2>';
        mysqli_close($dbc);
        exit();
        }
        else{
  echo '<p class="error">Для этого имени пользователя уже существует учетная запись. Пожалуйста, используйте другой адрес.</p>';
        $login = "";
    }
} else {
      echo '<p class="error">Вы должны ввести все регистрационные данные, включая нужный пароль дважды.</p>';
    } 
}

  mysqli_close($dbc);
          ?>	



   


