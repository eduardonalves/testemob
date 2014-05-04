
<!DOCTYPE html>
	 
<html> 
<head> 
	<title>My Page</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
</head> 
<body> 

<div id="index" data-role="page">
	<div data-role="header">
		<h1>App Entrada</h1>
	</div><!-- /header -->
	<div data-role="content">
		<form method="post" action="gravarlogin.php"  data-ajax="false" id="login">
			<label for="text-basic">Login:</label>
			<input type="text"  id="text-basic" value="" name="username"  placeholder="Username" >	
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" value="" autocomplete="off" name="password" placeholder="Password" >
			
			<button type="submit" id="submitForm" class="ui-shadow ui-btn ui-corner-all ui-mini"  data-theme="a"  >Entrar</button>
			
		</form>
		<div data-role="popup" id="popupDialog" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">
			    <div data-role="header" data-theme="a">
			    <h2>Erro</h2>
			    </div>
			    <div role="main" class="ui-content">
			        <h3 class="ui-title">Usuário ou senha incorreto(s)</h3>
			        <a href="#" data-role="button" data-rel="back" data-overlay-theme="a" data-theme="a">Fechar</a>
			    </div>
		</div>
	</div><!-- /content -->
	
	<div data-role="footer">
		<small>Meu primeiro aplicativo de celular, todos os direitos reservados para Eduardo, versão do aplicativo 1.0</small>
	</div><!--Footer-->
</div><!-- /page -->
<div id="resposta"></div>
<?php
if(isset($_SESSION['logado'])){
	echo $_SESSION['logado'];
}
?>
<style>
	.error{color:red; margin:0 auto;}
</style>
<script>
$(document).ready(function() {
	

	$('#submitForm').click(function(event){
	event.preventDefault();
	
	var urlAction = "http://testerma.uphero.com/gravarlogin.php";
	var dadosForm = $("#login").serialize();

	
		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			crossDomain: true,
			
			
			
			success: function(data){
				
				var res = data.substring(0, 8);
				console.log(res);
				if(res == 'ErroLogi'){
					alert("passou");
					window.location.href = 'index.php';
					
				}else{
					alert(res);
					$( "#popupDialog" ).popup( "open" );
				}
			
			},error: function(data){
				alert(data);
				console.log(data);
				$("#resposta").html(data);
				
			}
			});
		});
 		
 });
 </script>
</body>
</html>