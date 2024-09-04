<?php 
//Resolução da questão 4)
$array = [
  "SP" => 67836.43,
  "RJ" => 36678.66,
  "MG" => 29229.88,
  "ES" => 27165.48,
  "Outros" => 19849.53,
];

calculaPercentual($array);

function calculaPercentual(array $array){

  $total = 0;
  foreach($array as $valor){
    $total += $valor;
  }

  echo "Percentual de representação do mês: <br><pre>";

  foreach($array as $estado => $valor){
    $percentual = number_format(($valor / $total) * 100,2,",");
    echo "$estado -> $percentual% <br>";
  }
  echo "</pre>";
}

?>