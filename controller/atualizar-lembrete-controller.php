<?php
require_once '../model/Lembrete.php';

$id = $_GET['id'];
$descricao = $_POST['descricao'];

$lembrete = new Lembrete();
$lembrete->atualizarLembrete($id,$descricao);

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/conta.php'>";