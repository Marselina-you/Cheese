<?php
require_once('appvars.php');
// Connect to the database
  $dbc = mysqli_connect('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
  $query = "SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description FROM edit";
  $data = mysqli_query($dbc, $query);
   $info = mysqli_fetch_array($data);
   echo '<div class="row box1-view-content-ihfo d-flex col-lg-12">
            <div class="box1-view-content-ihfo__foto col-lg-12 d-flex">
              <div class="box1-view-content-ihfo__foto-img col-lg-5">
                <img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="Сыр фото" />
              </div>';