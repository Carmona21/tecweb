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

    function ejercicio6($matricula){
        $vehiculos = [
            "UBN6338" => [
                "auto" => ["Marca" => "HONDA", "Modelo" => "2020", "Tipo" => "camioneta"],
                "propietario" => ["nombre" => "Alfonso Esparza", "ciudad" => "Puebla, Pue", "direccion" => "C.U., Jardines de San Manuel"]
            ],
            "KLP1234" => [
                "auto" => ["Marca" => "TOYOTA", "Modelo" => "2018", "Tipo" => "sedan"],
                "propietario" => ["nombre" => "María López", "ciudad" => "Guadalajara, Jal", "direccion" => "Av. Patria 245"]
            ],
            "ZXC5678" => [
                "auto" => ["Marca" => "NISSAN", "Modelo" => "2021", "Tipo" => "hatchback"],
                "propietario" => ["nombre" => "Carlos Hernández", "ciudad" => "Monterrey, NL", "direccion" => "Col. Centro"]
            ],
            "RTY3456" => [
                "auto" => ["Marca" => "FORD", "Modelo" => "2017", "Tipo" => "camioneta"],
                "propietario" => ["nombre" => "Laura Méndez", "ciudad" => "Mérida, Yuc", "direccion" => "Calle 60 #120"]
            ],
            "ASD9012" => [
                "auto" => ["Marca" => "CHEVROLET", "Modelo" => "2019", "Tipo" => "sedan"],
                "propietario" => ["nombre" => "José Ramírez", "ciudad" => "Cancún, Q. Roo", "direccion" => "Zona Hotelera"]
            ],
            "QWE4321" => [
                "auto" => ["Marca" => "MAZDA", "Modelo" => "2022", "Tipo" => "hatchback"],
                "propietario" => ["nombre" => "Sofía Martínez", "ciudad" => "CDMX", "direccion" => "Col. Roma Norte"]
            ],
            "BNM7654" => [
                "auto" => ["Marca" => "VOLKSWAGEN", "Modelo" => "2020", "Tipo" => "sedan"],
                "propietario" => ["nombre" => "Fernando Torres", "ciudad" => "Querétaro, Qro", "direccion" => "Av. Constituyentes 150"]
            ],
            "PLK2468" => [
                "auto" => ["Marca" => "KIA", "Modelo" => "2021", "Tipo" => "camioneta"],
                "propietario" => ["nombre" => "Lucía Gómez", "ciudad" => "Toluca, EdoMex", "direccion" => "Col. Universidad"]
            ],
            "GHJ1357" => [
                "auto" => ["Marca" => "HYUNDAI", "Modelo" => "2018", "Tipo" => "hatchback"],
                "propietario" => ["nombre" => "Miguel Ángel Ruiz", "ciudad" => "San Luis Potosí, SLP", "direccion" => "Col. Industrial"]
            ],
            "MNB9753" => [
                "auto" => ["Marca" => "BMW", "Modelo" => "2019", "Tipo" => "sedan"],
                "propietario" => ["nombre" => "Andrea Castro", "ciudad" => "León, Gto", "direccion" => "Blvd. López Mateos 500"]
            ],
            "VFR8520" => [
                "auto" => ["Marca" => "AUDI", "Modelo" => "2020", "Tipo" => "camioneta"],
                "propietario" => ["nombre" => "Jorge Aguilar", "ciudad" => "Pachuca, Hgo", "direccion" => "Col. Periodistas"]
            ],
            "CDE6428" => [
                "auto" => ["Marca" => "TESLA", "Modelo" => "2022", "Tipo" => "sedan"],
                "propietario" => ["nombre" => "Gabriela Chávez", "ciudad" => "CDMX", "direccion" => "Santa Fe"]
            ],
            "YHN1597" => [
                "auto" => ["Marca" => "MERCEDES", "Modelo" => "2017", "Tipo" => "camioneta"],
                "propietario" => ["nombre" => "Raúl Mendoza", "ciudad" => "Morelia, Mich", "direccion" => "Col. Centro"]
            ],
            "LOP7531" => [
                "auto" => ["Marca" => "PEUGEOT", "Modelo" => "2019", "Tipo" => "hatchback"],
                "propietario" => ["nombre" => "Daniela Ortiz", "ciudad" => "Aguascalientes, Ags", "direccion" => "Av. Universidad 321"]
            ],
            "JKL8888" => [
                "auto" => ["Marca" => "JEEP", "Modelo" => "2021", "Tipo" => "camioneta"],
                "propietario" => ["nombre" => "Víctor Morales", "ciudad" => "Tijuana, BC", "direccion" => "Playas de Tijuana"]
            ]
        ];

        if(isset($vehiculos[$matricula]) ){
            foreach ($vehiculos[$matricula] as $categoria => $datos) {
                echo "<strong>$categoria:</strong><br>";
                foreach ($datos as $campo => $valor) {
                    echo "$campo: $valor<br>";
                }
                echo "<br>";
            }
        }else{
            echo "vehiculo no encontrado";
        }
    }

?>