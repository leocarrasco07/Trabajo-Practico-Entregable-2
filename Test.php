<?php

include_once 'Teatro.php';
include_once 'Funciones.php';

$nombreTeatro="Colon";
$direccion="dorrego 1400";
$funcion=array(0 => array("nombre" => "el leon" , "precio" => 1400),
               1 => array("nombre" => "caperusita" , "precio" => 2000),
               2 => array("nombre" => "frozen" , "precio" => 4000),
               3 => array("nombre" => "pepa pig" , "precio" => 1800)
                );

$hora_inicio1=array(0 =>10 , 1 =>"00");
$durac_Obra1=array(0 => 2, 1 =>"00");
$hora_inicio2=array(0 =>12 , 1 =>"00");
$durac_Obra2=array(0 =>1 , 1 =>30);
$hora_inicio3=array(0 =>1 , 1 =>30);
$durac_Obra3=array(0 => 2, 1 =>30);
$hora_inicio4=array(0 =>4 , 1 =>"00");
$durac_Obra4=array(0 =>1 , 1 =>"00");


$funcion1=new Funciones("el leon", $hora_inicio1, $durac_Obra1, 1400);
$funcion2=new Funciones("caperusita", $hora_inicio2, $durac_Obra2, 2000);
$funcion3=new Funciones("frozen", $hora_inicio3, $durac_Obra3, 4000);
$funcion4=new Funciones("pepa pig", $hora_inicio4, $durac_Obra4, 1800);

$arregloFunciones = array(0 => $funcion1, 1 => $funcion2, 2 => $funcion3, 3 => $funcion4);

$Teatro = new Teatro($nombreTeatro, $direccion, $arregloFunciones);

echo $Teatro->__toString();

    function Menu() {
        $menu = "1) Cambiar Nombre Teatro "."\n".
            "2) Cambiar  Direccion Teatro "."\n".
            "3) Cambiar Nombre de Funcion " . "\n".
            "4) Cambiar Precio Funcion " ."\n".
            "5) Mostrar Datos Teatro " ."\n".
            "6) Cargar Nueva Funcion "."\n".
            "7) SALIR "."\n";
    
        return $menu;
    }

    
    do {
        $seguir = true;
        echo Menu();
        echo "elige Opcion : "."\n";
        $opcion =trim(fgets(STDIN));
        if ($opcion == 1) {
            echo "Ingrese Nuevo Nombre: "."\n";
            $nuevoNombre = trim(fgets(STDIN));
            $Teatro ->cambiarNombreTeatro($nuevoNombre);
        }
        elseif ($opcion == 2) {
            echo "Ingrese Nueva Direccion :"."\n";
            $direc = trim(fgets(STDIN));
            $Teatro ->cambiarDireccTeatro($direc);
        }
        elseif ($opcion == 3) {
            echo "Ingrese Nombre Funcion A Cambiar :"."\n";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese NUEVO Nombre: "."\n";
            $nombreNuevo = trim(fgets(STDIN));
            $cambiado =$Teatro ->CambiarNombreFuncion($nombreNuevo, $nombre);
            if ($cambiado == true) {
                echo "Nombre Cambiado"."\n";
            }
            elseif ($cambiado == null) {
                echo "No se pudo cambiar"."\n";
            }
        }
        elseif ($opcion == 4) {
            echo "Ingrese Nombre Funcion a precio a cambiar"."\n";
            $funNombre= trim(fgest(STDIN));
            echo "ingrese Nuevo Precio :"."\n";
            $precioNuevo = trim(fgest(STDIN));
            $cambiado = $Teatro ->CambiarPrecioFuncion($funNombre, $precioNuevo);
            if ($cambiado == true) {
                echo "precio Cambiado"."\n";
            }
            elseif ($cambiado == null) {
                echo "no se pudo cambiar" ."\n";
            }
        }
        elseif ($opcion == 5) {
            echo $Teatro ->__toString();
        }
        elseif ($opcion == 6){
            echo "Ingrese Nombre de la Funcion: "."\n";
            $nombre =  trim(fgest(STDIN));
            echo "Ingrese Hora Inicio: "."\n";
            echo "Hora: "."\n";
            $hora =  trim(fgest(STDIN));
            echo "minutos: "."\n";
            $minutos =  trim(fgest(STDIN));
            $horaInicio = array(0 => "".$hora."", 1 => "".$minutos."");
            echo "Ingrese La Duracion de la Funcion: "."\n";
            echo "Hora: "."\n";
            $horaDurac =  trim(fgest(STDIN));
            echo "minutos: "."\n";
            $minutosDurac = trim(fgest(STDIN));
            $duracionFun = array(0 => "".$horaDurac."", 1 => "".$minutosDurac."");
            echo "Ingrese Precio : "."\n";
            $valor = trim(fgest(STDIN));
            $ingresado = $Teatro->cargarFuncion($nombre, $horaInicio, $duracionFun, $valor);
            
            if ($ingresado) {
                echo "Funcion Ingresada"."\n";
            }
            else{
                echo "No se pudo Ingresar"."\n";
            }
            
        }
        elseif ($opcion == 7) {
            $seguir = false;
        }
    }
    while ($seguir);
