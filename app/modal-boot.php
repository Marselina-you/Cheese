<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Демонстрация работы компонента modal</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <body>
    <!-- HTML-код модального окна -->
<div id="myModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Подтверждение</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>                
            </div>
            <div class="modal-body">
                <p>Вы хотите сохранить изменения в этом документе перед закрытием?</p>
                <p class="text-secondary"><small>Если вы не сохраните, ваши изменения будут потеряны.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<!-- HTML-код кнопки (триггер модального окна)-->
<button href="#myModal" class="btn btn-lg btn-primary" data-target="#myModal" data-toggle="modal">Запустить модальное окно</button> 
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="js1/bootstrap.min.js"></script>

    
<script>
$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal").modal("show");
    });
});
</script>
</body>
</html>             
            
