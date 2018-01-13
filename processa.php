<?php
session_start();

//Incluir a conexão com o BD
include_once("conexao.php");

//Receber os dados do formulário
$data = $_REQUEST['data'];
$servicos = $_REQUEST['servicos'];
$nome = $_REQUEST['nome'];
$telefone = $_REQUEST['telefone'];

//Converter a data e hora para o formato do BD.
$data = explode(" ", $data);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$data_sem_barra = $data_sem_barra . " " . $hora;

//Validação dos campos
if(empty($_POST['nome']) || empty($_POST['data']) || empty($_POST['servicos'])){
	$_SESSION['msg'] = "<div class='alert alert-warning'>Preencha os campos corretamente</div>";
	header("Location: index.php"); 
}else{
	//Salvar no BD
	$result_data = "INSERT INTO agendamentos(servicos, data, nome, telefone) VALUES ('$servicos','$data_sem_barra','$nome','$telefone')";
	$resultado_data = mysqli_query($conn, $result_data);

	//Verificar se salvou no banco de dados através do "mysqli_insert_id" que verifica se existe o ID do ultimo dado inserido
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<div class='alert alert-success'>Agendamento efetuado com sucesso</div>";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao efetuar o agendamento</div>";
		header("Location: index.php");
	}
	
}





?>