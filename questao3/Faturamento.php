<?php 


class Faturamento
{

  private int $dia_maior;
  private int $dia_menor;
  private float $valor_maior;
  private float $valor_menor;
  private int $acima_media;

  public function __construct(string $endereco_json)
  {
    $array_json = json_decode(file_get_contents($endereco_json),true);
    
    $this->dia_maior = $this->extrai_dados($array_json)['dia_maior'];
    $this->dia_menor = $this->extrai_dados($array_json)['dia_menor'];
    $this->valor_maior = $this->extrai_dados($array_json)['valor_maior'];
    $this->valor_menor = $this->extrai_dados($array_json)['valor_menor'];
    $media = $this->extrai_dados($array_json)['media'];

    $this->acima_media = $this->calculaMedia($array_json,$media);
  }

  public function getRelatorio():void
  {
    $dia_maior = $this->getDiaMaior();
    $dia_menor = $this->getDiaMenor();
    $valor_menor = $this->getValorMenor();
    $valor_maior = $this->getValorMaior();
    $acima_media = $this->acima_media;

    $relatorio = 
    "Maior faturamento no dia $dia_maior com R$ $valor_maior <br>
    Menor faturamento no dia $dia_menor com R$ $valor_menor <br>
    Tivemos $acima_media dias acima da média";

    echo $relatorio;
  }

  public function getDiaMaior():int
  {
    return $this->dia_maior;
  }

  public function getDiaMenor():int
  {
    return $this->dia_menor;
  }

  public function getValorMaior():string
  {
    return number_format($this->valor_maior,2,","," ");
  }

  public function getValorMenor():string
  {
    return number_format($this->valor_menor,2,","," ");
  }
  public function getDiasAcimaDaMedia():int
  {
    return $this->acima_media;
  }
  private function calculaMedia($array_json,$media):int
  {
    $conta_dias = 0;
    foreach($array_json as $faturamento){
      if($faturamento['valor'] == 0){
        continue;
      }
      if($faturamento['valor'] > $media){
        $conta_dias++;
      }
    }

    return $conta_dias;
  }

  private function extrai_dados($array_json):array
  {
    $valor_maior = $array_json[0]['valor'];
    $dia_maior = 0;
    $valor_menor = $array_json[0]['valor'];
    $dia_menor = 0;

    $total = 0;
    $qnt_dias = 0;
  
    foreach($array_json as $faturamento){
      if($faturamento['valor'] == 0){
        continue;
      }
      $se_maior = $faturamento['valor'] > $valor_maior;
      $se_menor = $faturamento['valor'] < $valor_menor;
      if($se_maior){
        $valor_maior = $faturamento['valor'];
        $dia_maior = $faturamento['dia'];
      }
      if($se_menor){
        $valor_menor = $faturamento['valor'];
        $dia_menor = $faturamento['dia'];
      }

      $total += $faturamento['valor'];
      $qnt_dias++;
    }

    
    $resultado['dia_maior'] = $dia_maior;
    $resultado['dia_menor'] = $dia_menor;
    $resultado['valor_maior'] = $valor_maior;
    $resultado['valor_menor'] = $valor_menor;
    $resultado['media'] = $total / $qnt_dias;

    return $resultado;

  }
  
}


?>