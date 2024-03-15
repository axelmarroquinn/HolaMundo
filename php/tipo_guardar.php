<?php
	require_once "main.php";

    /*== Almacenando datos ==*/
    $tipo_desc=limpiar_cadena($_POST['equipo_desc']);

    date_default_timezone_set('UTC');


    /*== Verificando campos obligatorios ==*/
    if($tipo_desc==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,50}",$tipo_desc)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    /*== Verificando nombre ==*/
    $check_tipo=conexion();
    $check_tipo=$check_tipo->query("SELECT desc_tipo FROM tbl_tipo_movimientos WHERE desc_tipo='$tipo_desc'");
    if($check_tipo->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_tipo=null;

    $fecha_actual = date("Y-m-d h:i:s");

    /*== Guardando datos ==*/
    $guardar_tipo=conexion();
    $guardar_tipo=$guardar_tipo->prepare("INSERT INTO tbl_tipo_movimientos(desc_tipo,fecha_creacion) VALUES(:desc_tipo,:fecha_creacion)");

    $marcadores=[
        ":desc_tipo"=>strtoupper($tipo_desc),
        ":fecha_creacion"=>$fecha_actual 
    ];

    $guardar_tipo->execute($marcadores);

    if($guardar_tipo->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡CATEGORIA REGISTRADA!</strong><br>
                La categoría se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar la categoría, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_tipo=null;