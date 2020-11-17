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
   
$son = new mysqli('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
 $select = $son->query("SELECT  name FROM mytable WHERE name IS NOT NULL ORDER BY name  LIMIT 180");
    while($info = $select->fetch_array()){
      echo"<div class=''>".$info['name']."</div>"; 
      echo"<div class=''>".$info['phone']."</div>";
}
echo '<div class="container-fluid"><div class="wrap-registration-form col-lg-12"><form enctype="multipart/form-data" method="post" class="registration-form col-lg-6 offset-lg-3" action="">
	
	  <div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center"><div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="user_name">Имя:</label></div>
      <div class="registration-form-block-input__input col-lg-6"><input type="text" class="col-lg-12" name="name"/></div></div>
      <div class="registration-form-block-input d-flex col-lg-12 justify-content-between align-items-center">
		    		<div class="registration-form-block-input__label size20px fontTahoma darkbrowncolor">
		    			<label for="user_phone">Телефон:</label></div>
		    		<div class="registration-form-block-input__input col-lg-6">
		    			<input type="text" class="col-lg-12" id="phone" name="phone"></div>
		    	</div>
      <input type="submit" value="Сохранить" name="submit" /></form>
  </div></div></body>';




  $dbc = mysqli_connect('localhost','root','root','letkino');
    if (isset($_POST['submit'])) {
      $name= $_POST['name'];
      $phone= $_POST['phone'];
      
      
          
 $query = "INSERT INTO mytable (name, phone) VALUES ('$name', ' $phone')";
          
           mysqli_query($dbc, $query);
           echo '<h2>Ваша новая учетная запись успешно создана. Теперь вы можете <a href="login.php">войти</a>.</h2>';
        mysqli_close($dbc);
        exit();
        }else{
  echo 'Не все данные внесены<br/>';
}
          ?>	



   


