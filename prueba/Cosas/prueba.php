<?php
echo "HOLA MUNDO";
echo "<br>";
    $a = 10;
    $b = 21;
    $sum = $a + $b;
    echo "La suma de $a + $b es $sum";
    echo "<br>";
    for ($i=1;$i<= 5;$i++){
        $m = $i*2;  
        echo "El valor es: $i <br>";
        echo "multiplicado por 2 El valor es: $m <br>";
    }
    function sumar ($t,$r){
        return $t+$r;
    }
    $t = 4;
    $r = 6;
    echo sumar($t,$r);

?>