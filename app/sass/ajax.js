$.ajax({
	url: '/index.php',         /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	data: {text: 'леткино'},     /* Параметры передаваемые в запросе. */
	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
		alert(data);            /* В переменной data содержится ответ от index.php. */
	}
});