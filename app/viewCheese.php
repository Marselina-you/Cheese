<?php
require_once('appvars.php');
// Connect to the database
  $dbc = mysqli_connect('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
  $query = "SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description FROM edit WHERE id = '" . $_GET['id'] . "'";
  $data = mysqli_query($dbc, $query);
    while ($info = mysqli_fetch_array($data)) {
      echo '
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.min.css">
  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Просмотр Одного Сыра</title>
</head>
<body>
	';
     require_once('undertitle.php');
     echo'
    <div class="container-fluid wrap_view-content col-lg-12">
        <div class="wrap_header-box2_menu menu-viewCheese">
		    <div class="header-box2_menu">
                <div class="title_menu  d-flex justify-content-between align-items-center  font-weight-bold size20px col-lg-8 col-md-12 d-flex offset-lg-2">
		   	        <div class="title_menu_logo"><img src="images/dest/logo.png"  alt=""/></div>
		   	        <a href="" class="title_menu_item browncolor">Магазин</a>
		   	        <a href="" class="title_menu_item browncolor">О нас</a>
		   	        <a href="" class="title_menu_item browncolor">Где купить</a>
		   	        <a href="" class="title_menu_item browncolor">Доставка</a>
		   	    </div>
		   	</div>
		   </div>
        <div class="view-content col-lg-8 offset-lg-2 col-sm-12 col-xs-12">
          <div class="view-content-title col-lg-12 d-flex">
            <div class="view-content-title__head text-center size26px darkbrowncolor">
              <strong>'  .$info['nal']. '</strong>
            </div>';
      echo '<div class="view-content-title__namecheese size26px darkbrowncolor">' . $info['name_rus'] . '
            </div>';
      echo '<div class="view-content-title__namecheese size26px darkbrowncolor">(' . $info['name'] . ')
            </div>';
      echo '<div class="view-content-title__namecheese size26px darkbrowncolor">&nbsp;&nbsp;-&nbsp;&nbsp;' . $info['country'] . '
            </div>
          </div>';

    echo '<div class="row box1-view-content-ihfo d-flex col-lg-12">
            <div class="box1-view-content-ihfo__foto col-lg-12 d-flex">
              <div class="box1-view-content-ihfo__foto-img col-lg-5">
                <img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="Сыр фото" />
              </div>';
        echo '<div class="box1-view-content-ihfo-text col-lg-5 offset-lg-2">
                <div class="box1-view-content-ihfo-text__namecheese">
                  <div class="h5 browncolor">'  .$info['name_rus']. '</div>
                  <div>(' . $info['name'] . ')</div>
                </div>';
          echo'<div class="box1-view-content-ihfo-text__value cheese-text">'  .$info['value']. ', 00 p</div>';
          echo'<div class="cheese-text">Цена указана за 200 грамм</div>';
         
         
          echo'<form action="buyCheese.php" class="view-content-forma" method="post">
            
              <div class="cheese-text">Количество</div>
               <div class="view-content-forma-input-wrap d-flex">
              <input type="text" placeholder="1" name="quantity" class="view-content-forma-input no_border "/>
             </div>
            <div class="view-content-forma-submit-wrap d-flex">
              <input type="submit"  name = "" class="btn btn-success view-content-forma-submit" value="Добавить в корзину"/>
            </div>
          </form>';
          echo'</div>
            </div>
          
      </div>
        </div>';
        
   echo'<div class="wrap-box1-view-content-ihfo__description col-lg-8 offset-lg-2 col-sm-12 col-xs-12">
          <div class="box1-view-content-ihfo__description  d-flex flex-column align-items-center col-lg-10 offset-lg-1 col-sm-12 col-xs-12">
            <div class="row box2-view-content-openihfo__item flex-column align-items-center col-lg-12">
              <div class="justify-content-space-between col-lg-12 padding-15">
                
                  <div class="minySize browncolor h5 col-lg-8 offset-lg-2 col-md-6 offset-md-3 col-sm-11 col-xs-11 d-flex justify-content-between">'  .$info['name_rus']. ' - Oписание
                  <span class="expand col-lg-1 offset-lg-3 col-md-1 col-sm-1 col-xs-1 text-center size20px fontTahoma">+</span></div>
                  
                ';
echo'  <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 col-xs-12 cheese-text-none">'  .$info['description']. '</div>
            </div>
            </div>';
       
       echo'<div class="row box2-view-content-openihfo__item flex-column align-items-center col-lg-12">
              <div class="justify-content-space-between col-lg-12 padding-15">
                
                  <div class="minySize browncolor h5 col-lg-8 offset-lg-2 col-md-6 offset-md-3 col-sm-11 col-xs-11 d-flex justify-content-between">Пищевая ценность
                  <span class="col-lg-1  offset-lg-3 col-md-1 col-sm-1 col-xs-1 text-center size20px fontTahoma expand">+</span></div>
                  
                
        <div class="cheese-text col-lg-10 offset-lg-1 col-md-8 offset-md-2 cheese-text-none text-center">'  .$info['calories']. 'Kk&nbsp;на 100грамм</div>
              </div>
              </div>';


       echo'<div class="row box2-view-content-openihfo__item flex-column align-items-center col-lg-12">
              <div class="justify-content-space-between col-lg-12 padding-15">
               
                  <div class="minySize browncolor h5 col-lg-8 offset-lg-2 col-md-6 offset-md-3 col-sm-11 col-xs-11 d-flex justify-content-between">Срок годности<span class="expand col-lg-1 offset-lg-3 col-md-1 col-sm-1 col-xs-1 text-center col-lg-1  offset-lg-1 col-md-1 col-sm-1 col-xs-1 text-center size20px fontTahoma">+</span></div>
                  ';
                
        echo'<div class="cheese-text cheese-text-none col-lg-10 offset-lg-1 col-md-8 offset-md-2 text-center">'  .$info['life']. '&nbsp;суток после вскрытия упаковки</div>
            </div>
              </div>
        




          </div>
        </div>
      </div>
    <script src="js/app.min.js"></script>
    <script src="js/desc.js"></script>    
</body>
</html>';
  require_once('footer.php');   }
  

 
  
 
