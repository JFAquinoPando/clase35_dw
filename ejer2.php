<?php
$galletas = 11;
do {
    echo $galletas . ", ";
    $galletas++;
} while ($galletas < 10);
//Crea el código PHP donde generes:
//a) Un bucle do...while que cuente desde 50 hasta 40 (en este caso
//es decreciente)
//b) Un bucle do...while que a partir de una variable $contador que toma
//valores de 1 a 5, muestre por pantalla el doble del valor de $contador,
//es decir, que muestre 2, 4, 6, 8, 10.
//c) Mostrar en pantalla la tabla del 6 utilizando un bucle do 

$a = 51;
do {
    echo  "a vale: $a <br />";
    $a--;
} while ($a <= 50 AND $a >= 40);


$contador = 5;
do {
    echo ($contador * 2)."<br />";
    $contador++;
} while ($contador <= 5);