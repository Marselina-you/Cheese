<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/app.min.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>header1</title>
</head>

  <div class="modal-content">
<?php
require_once('appvars.php');
// Connect to the database
  $dbc = mysqli_connect('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
  $query = "SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description FROM edit WHERE id = '" . $_GET['id'] . "'";
  $data = mysqli_query($dbc, $query);
    while ($info = mysqli_fetch_array($data)) {
      echo '


 
  <div class="view-content__quick col-lg-12">
    <div class="view-content-title__quick col-lg-12 d-flex justify-content-between">
      <div class="view-content-title__quick__padding d-flex">
      <div class="view-content-title__head text-center size26px darkbrowncolor">
              <strong>'  .$info['nal']. '</strong>
            </div>';
      echo'<div class="view-content-title__namecheese size26px darkbrowncolor">' . $info['name_rus'] . '
            </div>';
       echo'<div class="view-content-title__namecheese size26px darkbrowncolor">(' . $info['name'] . ')
            </div>';
       echo'<div class="view-content-title__namecheese size26px darkbrowncolor">&nbsp;&nbsp;-&nbsp;&nbsp;' . $info['country'] . '
            </div></div>
      <div class="quick-close"><span class="close close-padding">&times;</span></div>
    </div>';
    echo'<div class="modal-body">
        <div class="row box1-view-content-ihfo d-flex col-lg-12">
            <div class="box1-view-content-ihfo__foto col-lg-12 d-flex">
              <div class="box1-view-content-ihfo__foto-img col-lg-5">
                <img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="Сыр фото" />
              </div>';
      echo'<div class="box1-view-content-ihfo-text col-lg-5 offset-lg-2">
                <div class="box1-view-content-ihfo-text__namecheese">
                  <div class="h5 browncolor">'  .$info['name_rus']. '</div>';
                  echo'<div>(' . $info['name'] . ')</div>
                </div>';
          echo'<div class="box1-view-content-ihfo-text__value cheese-text">'  .$info['value']. '</div>
          <div class="cheese-text">Цена указана за 200 грамм</div>';
         
         
        echo' <form action="buyCheese.php" class="view-content-forma" method="post">
            
              <div class="cheese-text">Количество</div>
               <div class="view-content-forma-input-wrap d-flex">
              <input type="text" placeholder="1" name="quantity" class="view-content-forma-input no_border "/>
             </div>
            <div class="view-content-forma-submit-wrap d-flex">
              <input type="submit"  name = "" class="btn btn-success view-content-forma-submit" value="Добавить в корзину"/>
            </div>
            <div class="view-content-forma__detail"><a href="viewCheese.php?id=' . $info['id'] . '" class="text-center browncolor size26px fontTahoma">Подробнее</a></div>
          </form>
          </div>
            </div>
          
      </div>
        
         
    </div></div>';}?>
    </div>
 <script src="js/app.min.js"></script>
  </html>