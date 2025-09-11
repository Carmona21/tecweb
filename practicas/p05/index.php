<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
    <p>$a = “ManejadorSQL”,  $b = 'MySQL’,  $c = &$a</p>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo '<ul>';
        echo '<li>$a es </li>', $a;
        echo '<li>$b es </li>', $b;
        echo '<li>$c es </li>', $c;
        echo '</ul>';

        echo '<p><strong>Explicación:</strong> 
        Primero <code>\$c</code> apuntaba a <code>\$a</code>, 
        mientras que <code>\$b</code> era independiente. 
        Después, al hacer <code>\$b = &\$a</code>, 
        las tres variables quedaron referenciando el mismo valor y al actualizar el valor de
        a estos tres cambiaron su valor.</p>';
        $a = "PHP Server";
        $b = &$a;
        echo '<ul>';
        echo '<li>$a es </li>', $a;
        echo '<li>$b es </li>', $b;
        echo '</ul>';
    ?>
    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</p>
    <p>$a = “PHP5”, $z[] = &$a,  $b = “5a version de PHP”, $c = $b*10, $a .= $b,
        $b *= $c, $z[0] = “MySQL”
    </p>
    <?php
        unset($a);
        unset($b);
        unset($c);
        $a = "PHP5";
        echo "La variable a es: ", $a;
        echo "<br><br>";

        $z[] = &$a;
        echo "La variable z es: ";
        print_r($z);
        echo "<br><br>";

        $b = "5a version de PHP";
        echo "La variable b es: ", $b;
        echo "<br><br>";

        @$c = $b*10;
        echo "La variable c es: ", $c;
        echo "<br><br>";

        $a .= $b;
        echo "La variable a es: ", $a;
        echo "<br>La variable b es: ", $b;
        echo "<br><br>";

        @$b *= $c;
        echo "La variable b es: ", $b;
        echo "<br>La variable c es: ", $c;
        echo "<br><br>";

        $z[0] = "MySQL";
        echo "La variable z es: ";
        print_r($z);
        echo "<br><br>";
    ?>
    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.</p>
    <?php
        unset($a);
        unset($b);
        unset($c);
        $a = "PHP5";
        echo "La variable a = " . $GLOBALS["a"] . "<br><br>";

        $z[] = &$a;
        echo "La variable z = ";
        print_r($GLOBALS["z"]);
        echo "<br><br>";

        $b = "5a version de PHP";
        echo "La variable b = " . $GLOBALS["b"] . "<br><br>";

        @$c = $b * 10;
        echo "La variable c = " . $GLOBALS["c"] . "<br><br>";

        $a .= $b;
        echo "La variable a = " . $GLOBALS["a"] . "<br>";
        echo "La variable b = " . $GLOBALS["b"] . "<br><br>";

        @$b *= $c;
        echo "La variable b = " . $GLOBALS["b"] . "<br>";
        echo "La variable c = " . $GLOBALS["c"] . "<br><br>";

        $z[0] = "MySQL";
        echo "La variable z = ";
        print_r($GLOBALS["z"]);
    ?>
</body>
</html>