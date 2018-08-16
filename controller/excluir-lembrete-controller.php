<?php
require_once '../model/Lembrete.php';

$id = $_GET['id'];

$lembrete = new Lembrete();
$lembrete->deletarLembrete($id);

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/conta.php'>";