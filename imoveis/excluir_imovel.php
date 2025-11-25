<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../login/login.php");
    exit;
}

include '../db/conexao.php';

if(!isset($_GET['id'])){
    header("Location: gerenciar_imoveis.php");
    exit;
}

$id = intval($_GET['id']);

// Buscar imagem para excluir do servidor
$sqlImg = "SELECT imagem FROM imoveis WHERE id=$id";
$resImg = mysqli_query($conexao, $sqlImg);
$imovel = mysqli_fetch_assoc($resImg);
if($imovel && file_exists("../uploads/imoveis/".$imovel['imagem'])){
    unlink("../uploads/imoveis/".$imovel['imagem']);
}

// Deletar do banco
$sql = "DELETE FROM imoveis WHERE id=$id";
mysqli_query($conexao, $sql);

// Redirecionar de volta
header("Location: gerenciar_imoveis.php");
exit;
?>