<!DOCTYPE html>
<html>
<head>
	<title>Главная страница</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<button id="price" href="">Прайс-лист</button>
	<div id="content"></div>
<script src="js/app.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="js1/bootstrap.min.js"></script>
<script type="text/javascript">     
 $('#price').on('click', function(){ //При клике по элементу с id=price выполнять...
        $.ajax({
            url: 'assortiment.php', //Путь к файлу, который нужно подгрузить
            type: 'GET',
            beforeSend: function(){
                $('#content').empty(); //Перед выполнением очищает содержимое блока с id=content
            },
            success: function(responce){        
                    $('#content').append(responce); //Подгрузка внутрь блока с id=content
            },
            error: function(){
                alert('Error!');            
            }
        });
    });
    </script>       
</body>
</html>