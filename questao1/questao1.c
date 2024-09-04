//Resolução da questão 1): 
#include <stdio.h>
#include <locale.h>

void main(){

  setlocale(LC_ALL,"Portuguese");

  int indice, soma, k;
  indice = 13;
  soma = 0;
  k = 0;
  
  while (k < indice) {
    k = k + 1;
    soma = soma + k;
  }
  
  printf("O resultado é: %d", soma);

}
