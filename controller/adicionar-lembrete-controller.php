<?php
require_once '../model/Lembrete.php';

$usuarioid = $_POST['usuarioid'];
$descricao = $_POST['descricao'];

$lembrete = new Lembrete();
$lembrete->adicionarLembrete($descricao,$usuarioid);

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/conta.php'>";