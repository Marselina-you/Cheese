<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  
  <link rel="stylesheet" href="css/app.min.css">
  <script src="js/app.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>header1</title>
</head>

<body>
  <div class="container-fluid assortiment-container">
    <div class="row AssortmentTitle">
      <div class="row AssortmentTitle-1 col-lg-8 offset-lg-4 greencolor align-items-center"><h1><strong>Эталонные сыры</strong></h1></div>
        <div class="row AssortmentTitle-2 col-lg-8 offset-lg-4 browncolor"><h2>Классические европейские сыры</h2></div>
    </div>



    <div class="row photoProduct-total  justify-content-center d-flex col-lg-12
  col-sm-12">
  <?php  require_once('appvars.php');
    
    $son = new mysqli('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
 $select = $son->query("SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description  FROM edit WHERE name IS NOT NULL ORDER BY name  LIMIT 180");
    while($info = $select->fetch_array()){
      
      echo'<div class="photoProduct col-lg-3 col-md-6 col-sm-6 col-xs-12 ">
        <div class="photoProductImg"><img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="" /></div>';
        echo'<div class="quickView-div col-lg-12 text-center">
        <a href = "modal-content.php?id=' . $info['id'] . '.php" class="quickView whitecolor size22px"><div>Быстрый просмотр</div></a>
</div>';
        echo'<div class="nameCheese col-lg-12 browncolor  text-center"><h3 class="size29px">'.$info['name_rus'].'</h3></div>';
        echo'<div class="nameСountry col-lg-12 browncolor text-center"><h4 class="size26px ">'.$info['country'].'</h4></div>';
        echo'<div class="description col-lg-12 fonttextSegoeScript  browncolor text-center"><h5 class="size20px">' .$info['short_description']. '</h5></div>
      </div>'; }?>
    






    
      
    
  </div>
  <div  class="col-lg-8 offset-lg-2 wrap-modal">

 
  
              
            
          </div>
            </div>
          
      </div>
        
         
    </div></div></div>
</div>


</body>
</html>