<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Nuevo ingreso</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/ingreso_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
		
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Marca</label>
				  	<input class="input" type="text" name="ingreso_marca" pattern="[a-zA-Z ]{1,70}" maxlength="70" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Modelo</label>
				  	<input class="input" type="text" name="ingreso_modelo" pattern="[a-zA-Z0-9 ]{1,70}" maxlength="70" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Serie</label>
				  	<input class="input" type="text" name="ingreso_serie" pattern="[a-zA-Z0-9 ]{1,50}" maxlength="50" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Orden de Compra</label>
				  	<input class="input" type="text" name="ingreso_orden_compra" pattern="[0-9]{1,25}" maxlength="25" required >
				</div>
		  	</div>
              <div class="column">
				<label>Bodega</label><br>
		    	<div class="select ">
				  	<select name="ingreso_bodega" >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$bodega=conexion();
    						$bodega=$bodega->query("SELECT id_bodega,desc_bodega FROM tbl_bodegas");
    						if($bodega->rowCount()>0){
    							$bodega=$bodega->fetchAll();
    							foreach($bodega as $row){
    								echo '<option value="'.$row['id_bodega'].'" >'.$row['desc_bodega'].'</option>';
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
				  	<select name="ingreso_tipo" >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$tipo=conexion();
    						$tipo=$tipo->query("SELECT id_tipo,desc_tipo FROM tbl_tipo_movimientos");
    						if($tipo->rowCount()>0){
    							$tipo=$tipo->fetchAll();
    							foreach($tipo as $row){	
    								echo '<option value="'.$row['id_tipo'].'" >'.$row['desc_tipo'].'</option>';
				    			}
				   			}
				   			$tipo=null;
				    	?>
				  	</select>
				</div>    
		</div>	
    </div>
       
        
		<p class="has-text-centered">
			<button type="submit" class="button is-info">Guardar</button>
		</p>
	</form>
</div>