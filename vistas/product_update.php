<div class="container is-fluid mb-6">
	<h1 class="title">Equipos</h1>
	<h2 class="subtitle">Actualizar equipo</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando producto ==*/
    	$check_equipo=conexion();
    	$check_equipo=$check_equipo->query("SELECT * FROM tbl_inv_equipos WHERE id_prod='$id'");

        if($check_equipo->rowCount()>0){
        	$datos=$check_equipo->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><?php echo $datos['MARCA']; ?></h2>

	<form action="./php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

	<input type="hidden" name="id_prod" value="<?php echo $datos['ID_PROD']; ?>" required >

	<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Marca</label>
				  	<input class="input" type="text" name="update_marca" pattern="[a-zA-Z ]{1,70}" maxlength="70" required value="<?php echo $datos['MARCA'];?>">
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Modelo</label>
				  	<input class="input" type="text" name="update_modelo" pattern="[a-zA-Z0-9 ]{1,70}" maxlength="70" required value="<?php echo $datos['MODELO']; ?>">
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Serie</label>
				  	<input class="input" type="text" name="update_serie" pattern="[a-zA-Z0-9 ]{1,50}" maxlength="50" required value="<?php echo $datos['SERIE']; ?>">
				</div>
		  		</div>
		  	<div class="column">
		    	<div class="control">
					<label>Orden de Compra</label>
				  	<input class="input" type="text" name="update_orden_compra" pattern="[0-9]{1,25}" maxlength="25" required value="<?php echo $datos['OR_COMPRA']; ?>">
				</div>
				</div>


              <div class="column">
				<label>Bodega</label><br>
		    	<div class="select ">
				  	<select name="update_bodega" >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$bodega=conexion();
    						$bodega=$bodega->query("SELECT * FROM tbl_bodegas");
    						if($bodega->rowCount()>0){
    							$bodega=$bodega->fetchAll();
							   foreach($bodega as $row){
								if($datos['ID_BODEGA']==$row['ID_BODEGA']){
									echo '<option value="'.$row['ID_BODEGA'].'" selected="" >'.$row['DESC_BODEGA'].' (Actual)</option>';
								}else{
									echo '<option value="'.$row['ID_BODEGA'].'" >'.$row['DESC_BODEGA'].'</option>';
								}
							}
						   }
				   			$bodega=null;
				    	?>
				  	</select>
				</div>
		  		</div>	
              <div class="column">
				<label>Tipo</label><br>
		    	<div class="select ">
				  	<select name="update_tipo" >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$tipo=conexion();
    						$tipo=$tipo->query("SELECT * FROM tbl_tipo_movimientos");
    						if($tipo->rowCount()>0){
    							$tipo=$tipo->fetchAll();
    							foreach($tipo as $row){
							   if($datos['ID_TIPO']==$row['ID_TIPO']){
								echo '<option value="'.$row['ID_TIPO'].'" selected="" >'.$row['DESC_TIPO'].' (Actual)</option>';
							}else{
								echo '<option value="'.$row['ID_TIPO'].'" >'.$row['DESC_TIPO'].'</option>';
							}
						}
					   }
				   			$tipo=null;
				    	?>
				  	</select>
				</div>   
				</div>
			  <div class="column">
				<label>Estado</label><br>
		    	<div class="select ">
				  	<select name="update_estado" >
				    	<option value="ACTIVO" selected="" >ACTIVO</option>
				    	<option value="INACTIVO" selected="" >INACTIVO</option>
				  	</select>
				</div>    
			</div>	
  		</div>      
		  <br>


		<p class="has-text-centered">
			<button type="submit" class="button is-success">Actualizar</button>
		</p>
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_equipo=null;
	?>
	<br>
	<br>
	<br>
</div>