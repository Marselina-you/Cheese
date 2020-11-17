<?php
session_start();//Запускаем сессии 
require_once('appvars.php');
  $dbc = mysqli_connect('localhost','root','root','letkino');
    if (isset($_POST['submit'])) {
      $id = $_GET['id'];
      $name_rus = $_POST['name_rus'];
      $names= $_POST['names'];
      $value = $_POST['value'];
      $description = $_POST['description'];
      $calories = $_POST['calories'];
      $life = $_POST['life'];
      $nal = $_POST['nal'];
      $country = $_POST['country'];
      $short_description = $_POST['short_description'];
      $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
      $new_picture_type = $_FILES['new_picture']['type'];
      $new_picture_size = $_FILES['new_picture']['size']; 
      list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
        $error = false;
// При необходимости проверьте и переместите загруженный файл изображения
          if (!empty($new_picture)) { 
            if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') ||
        ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
        ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) {
              if ($_FILES['file']['error'] == 0) {
                $target = MM_UPLOADPATH . basename($new_picture);
                  if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                    if (!empty($old_picture) && ($old_picture != $new_picture)) {
                    @unlink(MM_UPLOADPATH . $old_picture);
                   }
                  } 
            else {
              @unlink($_FILES['new_picture']['tmp_name']);
              $error = true;
              echo '<p class="error">Извините, возникла проблема с загрузкой вашей фотографии.</p>';
            }
              }
            }
          else {
        // Новый файл изображения недопустим, поэтому удалите временный файл и установите флаг ошибки
        @unlink($_FILES['new_picture']['tmp_name']);
        $error = true;
        echo '<p class="error">Изображение должно быть в формате GIF, JPEG или PNG размером не более' . (MM_MAXFILESIZE / 1024) .
          ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
          }
          }
 // Обновление данных профиля в базе данных
      if (!$error) {
        if (!empty($names)) {
        // Установите столбец картинка только в том случае, если есть новая картинка
          if (!empty($new_picture)&&!empty($name_rus)&&!empty($names)&&!empty($value)&&!empty($description)&&!empty($calories)&&!empty($life)&&!empty($nal)&&!empty($short_description)) {
            $query = "INSERT INTO edit (foto, name_rus, name, value, description, calories, life, nal, country, short_description) VALUES ('$new_picture',  '$name_rus', '$names', '$value', '$description', '$calories',  '$life', '$nal', '$country', '$short_description' )";
               echo'<html>
  <head>
    <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/app.min.css">
    <title>Просмотр</title>
  </head>
  <body>
    <div class="container-fluid wrap_view-content">
      <div class="view-content col-lg-10 offset-lg-1">
        <div class="row view-content-title ">
          <div class="view-content-title__head browncolor text-center size24px ">
            <strong>'  .$nal. '</strong>
          </div>';
     echo'<div class="view-content-title__namecheese browncolor size24px">'  .$name_rus. '
          </div>';
     echo'<div class="view-content-title__namecheese browncolor size24px">('  .$names. ')
          </div>
        </div>';
   echo'<div class="row box1-view-content-ihfo">
          <div class="box1-view-content-ihfo__foto col-lg-12 d-flex">
            <div class="box1-view-content-ihfo__foto col-lg-5">
              <img src="' . MM_UPLOADPATH . $new_picture . '"  alt="Profile Picture" />
            </div>';
       echo'<div class="box1-view-content-ihfo-text col-lg-5">
              <div class="box1-view-content-ihfo-text__namecheese "><div class="h5 browncolor">'  .$name_rus. '</div>
              </div>';
         echo'<div class="box1-view-content-ihfo-text__value cheese-text">'  .$value. '
              </div>';
         echo'<div class="box1-view-content-ihfo-text__value cheese-text">'  .$short_description. '
              </div>';
         echo'<div class="box1-view-content-ihfo-text__value cheese-text">'  .$country. '
             </div>
            </div>
          </div>
        </div>
      </div>';
 echo'<div class="view-content wrap-box1-view-content-ihfo__description col-lg-10 offset-lg-1">
        <div class="box1-view-content-ihfo__description  d-flex flex-column align-items-center col-lg-12">
          <div class="row box2-view-content-openihfo__item flex-column align-items-center">
            <div class="h5">'  .$name_rus. ' - Oписание
            </div>';
      echo' <div class="cheese-text">'  .$description. '
            </div>
          </div>';
     echo'<div class="row box2-view-content-openihfo__item flex-column align-items-center">
            <div class="browncolor h5">Пищевая ценность
            </div>
            <div class="cheese-text">'  .$calories. 'Kk
            </div>
          </div>';
     echo'<div class="row box2-view-content-openihfo__item flex-column align-items-center">
            <div class="browncolor h5">Срок годности
            </div>
            <div class="cheese-text">'  .$life. '
            </div>
          </div>
        </div>
      </div>';
 echo'<div class="col-lg-2 offset-lg-9">
        <button type="button" class="btn btn-success my_href ">
          <a href="auto.php">сохранить</a>
        </button>
      </div>
    </div>
  </body>
</html>';
          }
        mysqli_query($dbc, $query);
        mysqli_close($dbc);
        exit();
        }else{
  echo 'Не все данные внесены<br/>';
}
      }
      }?>
