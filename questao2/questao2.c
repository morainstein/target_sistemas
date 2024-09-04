//Resolu��o da quest�o 2)

#include <stdio.h>
#include <locale.h>

void main(){
  setlocale(LC_ALL,"Portuguese");
  
  int fibonacci[2] = {0 , 1}, i, valor, soma, guarda[100], tem;


  printf("Insira o valor � ser conferido:\n");
  scanf("%d",&valor);

  for(i = 1; soma <= valor; i++){
    //algoritmo de Fibonacci
    soma = fibonacci[0] + fibonacci[1];
    fibonacci[0] = fibonacci[1];
    fibonacci [1] = soma;

    guarda[i] = soma; //array que guarda os resultados de cada soma para fazer a varredura
  }

  //limpando o ultimo espa�o de mem�ria da vari�vel, para poder percorrer 
  guarda[i] = 0;
  
  tem = 0; //armazena o valor l�gico de ter ou n�o ter
  i = 1;
  while (guarda[i]) //percorrendo o array para conferir se tem o valor indicado
  {
    if(guarda[i] == valor){
      tem = 1;
      printf("O valor %d faz parte da sequ�ncia de Fibonacci na %d� soma \n", valor,i);
    }
    i++;
  }

  if (tem == 0) //caso a variavel tem indique que n�o tem o n�mero, a mensagem a aparece
  {
      printf("O valor %d n�o existe na sequ�ncia de Fibonacci\n", valor);
  }
  


}