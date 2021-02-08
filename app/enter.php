<?php
  session_start();
  $error_msg = "";
  if (!isset($_SESSION['user_id'])) {
  if (isset($_POST['submit'])) {
    // The username/password weren't entered so send the authentication headers
   
  // Connect to the database
  $dbc = mysqli_connect('localhost','root','root','letkino');

  // Grab the user-entered log-in data
  $user_login = mysqli_real_escape_string($dbc, trim($_POST['login']));
  $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

  // Look up the username and password in the database
   if (!empty($user_login) && !empty($user_password)) {
  $query = "SELECT user_id, login FROM mytable WHERE login = '$user_login' AND password = SHA('$user_password')";
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // The log-in is OK so set the user ID and username variables
    $row = mysqli_fetch_array($data);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['login'] = $row['login'];
        setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        setcookie('login', $row['login'], time() + (60 * 60 * 24 * 30));
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'index.php';
          header('Location: ' . $home_url);
  }
  else {
    // The username/password are incorrect so send the authentication headers
     $error_msg = 'Извините, для того чтобы войти в приложение, вы должны ввести правильное имя и пароль';
        
  }
   }
  else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Извините, для того чтобы войти в приложение, вы должны ввести имя и пароль';
      }
  }
  }
?>


  
  <?php 
  require_once('undertitle.php');?>
<?php
  // если куки не содержит данных,выводится сообщение об ошибке и форма входа в приложение
  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>вход</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container-fluid block-registration-enter col-lg-12 d-flex flex-column">
        
        	<form method="post" class="block-enter__form  d-flex flex-column backgroud1" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="block-enter__label-input col-lg-12 d-flex align-items-center justify-content-between">
                    <label for="login" class="block-enter__label">Логин:</label>
                    <input type="text" name="login" class="block-enter__input" value="<?php if (!empty($user_login)) echo $user_login; ?>" />
                </div>
                <div class="block-enter__label-input col-lg-12 d-flex justify-content-between">
            	    <label for="login" class="block-enter__label">Пароль:</label>
                    <input type="password" name="password" class="block-enter__input"/>
                </div>
                <div class="block-enter-submit d-flex justify-content-end">
                    <input type="submit" class="block-enter__submit" name="submit" value="войти"/>
                </div>
            </form>
            <div class="block-registration col-lg-12 d-flex justify-content-end backgroud1">
				<button><a href="registration.php">регистрация</a></button>
			</div>
</div>

<?php
}

  else {
    // Confirm the successful log-in
   $dbc = mysqli_connect('localhost','root','root', 'letkino');
  $query = "SELECT name FROM mytable WHERE user_id = '" . $_SESSION['user_id'] . "'";
  $data = mysqli_query($dbc, $query);
   $row = mysqli_fetch_array($data);
    if ($row != NULL) {
      $login = $row['login'];
      $name = $row['name'];
    }
     mysqli_close($dbc); 
    
    echo'<div class="container-fluid block-registration-enter"><div class="block-enter col-lg-12">
      <div class="col-lg-6 block-update-profile__item fontTahoma size20px darkbrowncolor">Мы рады видеть тебя, ' . $name . '!</div>
      <div class="col-lg-6 block-update-profile__item fontTahoma size20px darkbrowncolor"><a href="logout.php">(Выйти)</a></div>
    
    <div class="col-lg-6 block-update-profile__item fontTahoma size20px darkbrowncolor"><a href="editprofile.php">редактировать</a></div></div></div>
    
  

  ';
  
  }
?>
<script src="js/editprofile.js"></script>
<script src="js/app.min.js"></script>

</body>
</html>
	