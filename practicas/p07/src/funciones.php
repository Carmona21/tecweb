<?php
    function multiplos($num)
    {
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
    }

    function ejercicio2(){
        $m = 0;
        $matriz = [];
        do{
            
            $num = mt_rand(0,1000);
            $num2 = mt_rand(0,1000);
            $num3 = mt_rand(0,1000);
            $m++;
            
            $matriz[$m-1][0] = $num;
            $matriz[$m-1][1] = $num2;
            $matriz[$m-1][2] = $num3;
            
            
        }while(!((($num % 2) == 1) && (($num2 % 2) == 0 ) && (($num3 % 2) == 1 )));

        echo $num," impar ",$num2," par ",$num3," impar","<br>";
        echo $m*3," numeros obtenidos en ",$m," iteraciones";
    }

    function ejercicio3($b){
        $m = 0;
        $matriz = [];
        do{
            
            $num = mt_rand(0,1000);
            $num2 = mt_rand(0,1000);
            $num3 = mt_rand(0,1000);
            $m++;
            
            $matriz[$m-1][0] = $num;
            $matriz[$m-1][1] = $num2;
            $matriz[$m-1][2] = $num3;
            
            
        }while(($num % $b) != 0);

        echo $num," es multiplo de ",$b,"<br>";
    }

    function ejercicio4(){
        $arreglo = [];
        for($i=97; $i<=122 ; $i++){
            $arreglo[$i] = chr($i);
        }

        echo '<table border="1" cellspacing="0" cellpadding="5">';
        echo '<tr><th>Índice</th><th>Valor</th></tr>';

        foreach ($arreglo as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    function ejercicio5($edad,$sexo){
        if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
            echo '<h2>Bienvenida, usted está en el rango de edad permitido.</h2>';
        } else {
            echo '<h2>Lo sentimos, no cumple con los requisitos.</h2>';
        }
    }
?>