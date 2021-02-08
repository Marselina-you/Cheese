<?php require_once('appvars.php');
$dbc = mysqli_connect('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
  $query = "SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description FROM edit WHERE id = '" . $_GET['id'] . "'";
  $data = mysqli_query($dbc, $query);
    while ($info = mysqli_fetch_array($data)) {
      echo '<div class="box1-view-content-ihfo__foto-img col-lg-5">
                <img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="Сыр фото" />
              </div>';}