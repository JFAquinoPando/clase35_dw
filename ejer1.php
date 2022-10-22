
<?php
$galletas = 11;
while ($galletas < 10) {
    echo $galletas;
    if ($galletas < 9) {
        echo ", ";
    }
    $galletas++;
}
//Crea el código PHP donde generes:
//a) Un bucle while que cuente desde 50 hasta 40 (en este caso es decreciente)
//b) Un bucle while que a partir de una variable $contador que toma valores de
// 1 a 5, muestre por pantalla el doble del valor de $contador, es decir,
// que muestre 2, 4, 6, 8, 10.
//c) Mostrar en pantalla la tabla del 6..

//A 
$a = 50;
while ($a <= 50 && $a >= 40) {
    echo  "a vale: $a <br />";
    $a--;
}

$contador = 5;
while ($contador <= 5) {
    echo ($contador * 2)."<br />";
    $contador++;
}

?>