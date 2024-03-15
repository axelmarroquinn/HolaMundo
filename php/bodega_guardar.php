<?php
	require_once "main.php";

    /*== Almacenando datos ==*/
    $desc_bodega=limpiar_cadena($_POST['bodega_nombre']);
    $ubicacion=limpiar_cadena($_POST['bodega_ubicacion']);
    $email=limpiar_cadena($_POST['bodega_email']);
    $telefono=limpiar_cadena($_POST['bodega_telefono']);
    $fecha=limpiar_cadena($_POST['bodega_fecha_ingreso']);


    /*== Verificando campos obligatorios ==*/
    if($desc_bodega==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}",$desc_bodega)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

   


    /*==VERIFICANDO EMAIL==*/
    if($email==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== VERIFICANDO ESTRUCTURA EMAIL ==*/
    if(verificar_datos("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$",$email)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

     /*==VERIFICANDO TELEFONO==*/
     if($telefono==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== VERIFICANDO ESTRUCTURA telefono ==*/
    if(verificar_datos("[0-9]{1,10}",$telefono)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    /*== Verificando nombre ==*/
    $check_bodega=conexion();
    $check_bodega=$check_bodega->query("SELECT desc_bodega FROM tbl_bodegas WHERE desc_bodega='$desc_bodega'");
    if($check_bodega->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_bodega=null;


    /*== Guardando datos ==*/
    $guardar_bodega=conexion();
    $guardar_bodega=$guardar_bodega->prepare("INSERT INTO tbl_bodegas(desc_bodega,direccion,email,telefono,fecha_creacion) VALUES(:desc_bodega,:ubicacion,:email,:telefono,:fecha_creacion)");

    $marcadores=[
        ":desc_bodega"=>$desc_bodega,
        ":ubicacion"=>$ubicacion,
        ":email"=>$email,
        ":telefono"=>$telefono,
        ":fecha_creacion"=>$fecha
    ];

    $guardar_bodega->execute($marcadores);

    if($guardar_bodega->rowCount()==1){
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
    $guardar_bodega=null;