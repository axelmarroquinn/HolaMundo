<div class="container is-fluid mb-6">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario</h2>
</div>
<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellido</label>
				  	<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Username</label>
				  	<input class="input" type="text" name="usuario_alias" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input class="input" type="email" name="usuario_email" maxlength="70" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
					<label>Telefono</label>
				  	<input class="input" type="text" name="usuario_telefono" pattern="[0-9]{1,10}"maxlength="10" >
				</div>
		  	</div>	
			  <div class="column">
				<label>Bodega</label><br>
		    	<div class="select ">
				  	<select name="usuario_bodega" >
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
		</div>	
		
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Clave</label>
				  	<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Repetir clave</label>
				  	<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info">Guardar</button>
		</p>
	</form>
</div>