<?php
require_once('appvars.php');


        
        $son = new mysqli('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
 $select = $son->query("SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description  FROM edit WHERE name IS NOT NULL ORDER BY name  LIMIT 180");
    $info = $select->fetch_array();
        echo $info['country'];
        
        
               
               echo 'Данные приняты -   ';
