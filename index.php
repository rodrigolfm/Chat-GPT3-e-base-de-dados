<!DOCTYPE html>
<html>
<head>
	<title>Chatbot</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<style>
		.chat-container {
			border: 1px solid #ccc;
			border-radius: 5px;
			height: 400px;
			overflow-y: scroll;
			margin-bottom: 20px;
		}
		.chat-message {
			background-color: #f1f0f0;
			padding: 10px;
			border-radius: 5px;
			margin-bottom: 10px;
			max-width: 80%;
		}
		.user-message {
			background-color: #007bff;
			color: white;
			align-self: flex-end;
			margin-left: 20%;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Chatbot</h2>
		<div class="chat-container" id="chatbot-output"></div>
		<form id="chatbot-form">
			<div class="input-group">
				<input type="text" class="form-control" id="user-input" name="user-input">
				<div class="input-group-append">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</div>
		</form>
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
				$('#chatbot-output').append('<div class="chat-message user-message">' + userInput + '</div>');
				$('#user-input').val('');
				$.ajax({
					url: 'processa-pergunta.php',
					method: 'POST',
					data: { user_input: userInput },
					success: function(data) {
						$('#chatbot-output').append('<div class="chat-message">' + data + '</div>');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#chatbot-output').append('<div class="chat-message">' + 'Erro: ' + errorThrown + '</div>');
					}
				});
				$('.chat-container').scrollTop($('.chat-container')[0].scrollHeight);
			});
		});
	</script>
</body>
</html>
