<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

	/*== Almacenando datos ==*/
	$marca=limpiar_cadena($_POST['ingreso_marca']);
	$modelo=limpiar_cadena($_POST['ingreso_modelo']);
	$serie=limpiar_cadena($_POST['ingreso_serie']);
	$orden=limpiar_cadena($_POST['ingreso_orden_compra']);
	$bodega=limpiar_cadena($_POST['ingreso_bodega']);
    $tipo=limpiar_cadena($_POST['ingreso_tipo']);


	/*== Verificando campos obligatorios ==*/
    if($marca=="" || $modelo=="" || $serie=="" || $bodega=="" || $tipo=="" ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-Z ]{1,70}",$marca)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La marca no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9 ]{1,70}",$modelo)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El modelo no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9 ]{1,25}",$serie)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El serial no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    /*== Verificando serie ==*/
    $check_serie=conexion();
    $check_serie=$check_serie->query("SELECT SERIE FROM tbl_inv_equipos WHERE serie='$serie' AND ESTADO = 'ACTIVO'");
    if($check_serie->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La SERIE ingresada ya se encuentra registrado, por favor elija otro.
            </div>
        ';
        exit();
    }
    $check_serie=null;
  
    $fecha_actual = date("Y-m-d h:i:s");
	
    $guardar_ingreso=conexion();
    $guardar_ingreso=$guardar_ingreso->prepare("INSERT INTO tbl_inv_equipos(marca,modelo,or_compra,serie,estado,fecha_creacion,id_usuario,id_bodega,id_tipo) VALUES(:marca,:modelo,:or_compra,:serie,:estado,:fecha_creacion,:id_usuario,:id_bodega,:id_tipo)");
   
    $marcadores=[
        ":marca"=> strtoupper($marca),
        ":modelo"=>$modelo,
        ":or_compra"=>$orden,
        ":serie"=>$serie,
        ":estado"=>'ACTIVO',
        ":fecha_creacion"=>$fecha_actual,
        ":id_usuario"=>$_SESSION['id'], 
        ":id_bodega"=>$bodega,
        ":id_tipo"=>$tipo
    ];

    $guardar_ingreso->execute($marcadores);

    if($guardar_ingreso->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO REGISTRADO!</strong><br>
                El producto se registro con exito
            </div>
        ';
    }else{


        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_ingreso=null;