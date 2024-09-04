<?php 
function inversor_strings(string $string){

  $tamanho = retorna_tamanho($string) - 1;
  
  $guarda = "";
  for($i = $tamanho; $i >= 0; $i--){
    $guarda .= $string[$i];
  }
  
  return $guarda;
}
function retorna_tamanho(string $string){
  $i = 0;
  while(@$string[$i] != null){
    $i++;
  }
  return $i;
}

$string = "teste";

$invertido = inversor_strings($string);

echo "A palavra $string invertida é: $invertido";

?>