function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}

function ejemplo1() {
    document.getElementById("resultado1").innerHTML = "Hola Mundo";
}

function ejemplo2() {
    var nombre = 'Eduardo';
    var edad = 21;
    var altura = 1.80;
    var casado = false;
    document.getElementById("resultado2").innerHTML =
    "Nombre: " + nombre + "<br>" +
    "Edad: " + edad + "<br>" +
    "Altura: " + altura + "<br>" +
    "Casado: " + casado;
}

function ejemplo3() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var edad = prompt('Ingresa tu edad:', '');

    document.getElementById("resultado3").innerHTML =
        "Hola " + nombre + ", así que tienes " + edad + " años.";
}

function ejemplo4() {
    var valor1 = prompt('Introducir primer numero', '');
    var valor2 = prompt('Introducir segundo numero', '');
    
    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    document.getElementById("resultado4").innerHTML =
        "La suma es " + suma + "<br>" +
        "El producto es " + producto + "<br>";
}

function ejemplo5() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota:', '');

    if(nota >= 4){
        document.getElementById("resultado5").innerHTML =
            nombre + " Esta aprobado con un " + nota
    }
}

function ejemplo6() {
    var num1 = prompt('Ingresa el primer numero:', '');
    var num2 = prompt('Ingresa el segundo numero:', '');

    num1 = parseInt(num1);
    num2 = parseInt(num2);

    if(num1 > num2){
        document.getElementById("resultado6").innerHTML = "El mayor es " + num1;
    }else{
        document.getElementById("resultado6").innerHTML = "El mayor es " + num2;
    }
}

function ejemplo7() {
    var nota1,nota2,nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3

    if(pro >= 7){
        document.getElementById("resultado7").innerHTML = "Aprobado";
    }
    else{
        if (pro >= 4) {
           document.getElementById("resultado7").innerHTML = "regular";
        }
        else{
            document.getElementById("resultado7").innerHTML = "reprobado";
        }
    }
}

function ejemplo8() {
    var valor;
    
    valor = prompt('Ingresa un valor comprendido entre 1 y 5', '');

    valor = parseInt(valor);

    switch (valor) {
        case 1:
            document.getElementById("resultado8").innerHTML = "uno";
            break;
        case 2:
            document.getElementById("resultado8").innerHTML = "dos";
            break;
        case 3:
            document.getElementById("resultado8").innerHTML = "tres";
            break;
        case 4:
            document.getElementById("resultado8").innerHTML = "cuatro";
            break;
        case 5:
            document.getElementById("resultado8").innerHTML = "cinco";
            break;

        default:
            document.getElementById("resultado8").innerHTML = "debe ingresar un valor comprendido entre 1 y 5";
            break;
    }
}

function ejemplo9() {
    var col;

    col = prompt('Ingresa el color con que quiera pintar el fondo de la venta (rojo, verde , azul)', '')
    
    switch (col) {
        case 'rojo':
            document.bgColor = '#ff0000';
            break;
        case 'verde':
            document.bgColor = "#00ff00";
            break;
        case 'azul':
            document.bgColor = '#0000ff';
            break;
            
        default:
            break;
    }
}

function ejemplo10(){
    var x = 1;

    while (x <= 100) {
        document.getElementById("resultado10").innerHTML += x + "<br>";
        x = x + 1;
    }
}

function ejemplo11() {
    var x = 1;
    var suma = 0;
    var valor;

    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }

    document.getElementById("resultado11").innerHTML = "La suma de valores es " + suma + "<br>";
}

function ejemplo12() {
    var valor;
    do {
        valor = prompt('Ingresa un valor entre 0 y 999', '');
        valor = parseInt(valor);

        document.getElementById("resultado12").innerHTML = 
            "El valor " + valor +" tiene";
        if (valor < 10) {
            document.getElementById("resultado12").innerHTML =
                "Tiene 1 digito";
        } else {
            if (valor < 100) {
                document.getElementById("resultado12").innerHTML = document.getElementById("resultado12").innerHTML =
                "Tiene 2 digitos";;
            }else{
                document.getElementById("resultado12").innerHTML =
                "Tiene 3 digitos";
            }
            document.getElementById("resultado12").innerHTML =
                "<br>";
        }
    } while (valor != 0);
}

function ejemplo13() {
    var f;

    for (f = 1; f <= 10; f++) {
        document.getElementById("resultado13").innerHTML = f + "";
    }
}

function ejemplo14() {
    document.getElementById("resultado14").innerHTML = 
        "Cuidado " + " Ingresatu documento correctamente " + "<br>"
        + "Cuidado " + " Ingresatu documento correctamente " + "<br>" +
        "Cuidado " + " Ingresatu documento correctamente " + "<br>";
}

function ejemplo15() {
    function mostrarMensaje() {
        document.getElementById("resultado15").innerHTML += 
        "Cuidado " + " Ingresatu documento correctamente " + "<br>"
    }
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function ejemplo16(){
    function mostrarRango(x1,x2) {
        var inicio;
        for(inicio = x1; inicio <= x2; inicio++){
            document.getElementById("resultado16").innerHTML += inicio + "<br>";
        }
    }

    var valor1,valor2;

    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);

    mostrarRango(valor1,valor2);
}

function ejemplo17() {
    function convetirCastellano(x){
        if (x == 1) {
            return "uno";
        }else{
            if (x == 2) {
                return "dos";
            }else{
                if (x == 3) {
                    return "tres";
                }else{
                    if (x == 4) {
                        return "cuatro";
                    }else{
                        if (x == 5) {
                            return "cinco";
                        }else{
                            return "Valor incorrecto"
                        }
                    }
                }
            }
        }
    }

    var valor = prompt('Ingresa un valor entre 1 y 5', '');
    valor = parseInt(valor);
    var r = convetirCastellano(valor);
    document.getElementById("resultado17").innerHTML = r;
}

function ejemplo18() {
    function convetirCastellano(x){
        
        switch (x) {
            case 1: return "uno";
            case 2: return "dos";
            case 3: return "tres";
            case 4: return "cuatro";
            case 5: return "cinco";

            default: return "valor incorrecto"
        }
    }

    var valor = prompt('Ingresa un valor entre 1 y 5', '');
    valor = parseInt(valor);
    var r = convetirCastellano(valor);
    document.getElementById("resultado18").innerHTML = r;
}