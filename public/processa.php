<?php
	include 'C:\xampp\htdocs\Gestor_Tarefas\app\control\control.php';	
	$mensagem = $_POST["mensagem"];	
	$controler = new control($mensagem);
	echo $controler->verificaAcaoDesejada($mensagem);
?>