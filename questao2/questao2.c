//Resolução da questão 2)

#include <stdio.h>
#include <locale.h>

void main(){
  setlocale(LC_ALL,"Portuguese");
  
  int fibonacci[2] = {0 , 1}, i, valor, soma, guarda[100], tem;


  printf("Insira o valor à ser conferido:\n");
  scanf("%d",&valor);

  for(i = 1; soma <= valor; i++){
    //algoritmo de Fibonacci
    soma = fibonacci[0] + fibonacci[1];
    fibonacci[0] = fibonacci[1];
    fibonacci [1] = soma;

    guarda[i] = soma; //array que guarda os resultados de cada soma para fazer a varredura
  }

  //limpando o ultimo espaço de memória da variável, para poder percorrer 
  guarda[i] = 0;
  
  tem = 0; //armazena o valor lógico de ter ou não ter
  i = 1;
  while (guarda[i]) //percorrendo o array para conferir se tem o valor indicado
  {
    if(guarda[i] == valor){
      tem = 1;
      printf("O valor %d faz parte da sequência de Fibonacci na %dº soma \n", valor,i);
    }
    i++;
  }

  if (tem == 0) //caso a variavel tem indique que não tem o número, a mensagem a aparece
  {
      printf("O valor %d não existe na sequência de Fibonacci\n", valor);
  }
  


}