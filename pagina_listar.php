<?php 
	session_start();
	//Conexão com banco de dados
	include_once("conexao.php");
?>
<div class="panel panel-danger text-center">
	<nav class="navbar navbar-default">
		<h3 class="text-center text-danger">Agendamentos para hoje</h3>
	</nav>
  	<?php
  		$result_horarios = "SELECT * FROM agendamentos WHERE DAY(data) = DAY(CURDATE()) AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$resultado_horarios = mysqli_query($conn, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<div class='text-center'>";
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			echo "<strong>Serviço:</strong> ".$row_horarios['servicos']."<br>";
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
			echo "</div>";
			echo "<br>";
		}
  	?>
</div>
<hr>
<div class="panel panel-success text-center">
	<nav class="navbar navbar-default">
		<h3 class="text-center text-success">Agendamentos deste mês</h3>
	</nav>
    <?php
    	$result_horarios = "SELECT * FROM agendamentos WHERE MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$resultado_horarios = mysqli_query($conn, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			echo "<strong>Serviço:</strong> ".$row_horarios['servicos']."<br>";
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
			echo "<hr>";
		}
    ?> 
</div>   
