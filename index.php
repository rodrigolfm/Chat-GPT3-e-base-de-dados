<!DOCTYPE html>
<html>
<head>
	<title>Chatbot</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Chatbot</h2>
		<form id="chatbot-form">
			<div class="form-group">
				<label for="user-input">Digite sua pergunta:</label>
				<input type="text" class="form-control" id="user-input" name="user-input">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
		<div id="chatbot-output"></div>  
	</div>
	<script>
		$(document).ajaxStart(function(){
		  $("#chatbot-output").html('<div class="spinner-border" role="status"><span class="sr-only">Carregando...</span></div>');
		});

		$(document).ajaxStop(function(){
		  $(".spinner-border").remove();
		});

		$(document).ready(function() {
			$('#chatbot-form').submit(function(event) {
				event.preventDefault();
				var userInput = $('#user-input').val();
				$.ajax({
					url: 'processa-pergunta.php',
					method: 'POST',
					data: { user_input: userInput },
					success: function(data) {
						$('#chatbot-output').html(data);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#chatbot-output').html('Erro: ' + errorThrown);
					}
				});
			});
		});
	</script>
</body>
</html>
