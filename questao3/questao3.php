<?php 
//Resolução da questão 3)
include_once 'Faturamento.php';

$Faturamento = new Faturamento("dados.json");

$Faturamento->getRelatorio();

?>