<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id_prod']);    

    /*== Verificando producto ==*/
	$check_equipo=conexion();
	$check_equipo=$check_equipo->query("SELECT * FROM tbl_inv_equipos WHERE id_prod='$id'");

    if($check_equipo->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El producto no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_equipo->fetch();
    }
    $check_equipo=null;


    /*== Almacenando datos ==*/
    $marca=limpiar_cadena($_POST['update_marca']);
	$modelo=limpiar_cadena($_POST['update_modelo']);
    $orden=limpiar_cadena($_POST['update_orden_compra']);
    $serie=limpiar_cadena($_POST['update_serie']);
    $estado=limpiar_cadena($_POST['update_estado']);
	$bodega=limpiar_cadena($_POST['update_bodega']);
    $tipo=limpiar_cadena($_POST['update_tipo']);

	/*== Verificando campos obligatorios ==*/
    if($marca=="" || $modelo=="" || $serie=="" || $orden=="" || $bodega=="" || $tipo=="" || $estado=="" ){
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

    if(verificar_datos("[0-9]{1,25}",$orden)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El serial no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
  

    $fecha_actual = date("Y-m-d h:i:s");

    $guardar_update = conexion();
    $guardar_update = $guardar_update->prepare("UPDATE tbl_inv_equipos SET marca=:marca, modelo=:modelo, or_compra=:or_compra,
                                                                            serie=:serie, estado=:estado, id_bodega=:id_bodega, id_tipo=:id_tipo, fecha_salida=:fecha_salida  
                                                WHERE id_prod='$id'");
    
    $marcadores = [
        ":marca" => strtoupper($marca),
        ":modelo" => $modelo,
        ":or_compra" => $orden,
        ":serie" => $serie,
        ":estado" => $estado,
        ":id_bodega" => $bodega,
        ":id_tipo" => $tipo,
        ":fecha_salida"=>$fecha_actual
    ];


    if($guardar_update->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO ACTUALIZADO!</strong><br>
                El producto se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_update=null;