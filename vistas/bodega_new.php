<div class="container is-fluid mb-6">
	<h1 class="title">Bodegas</h1>
	<h2 class="subtitle">Registro de nueva bodega</h2>
</div>

<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/bodega_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Descripcion de Bodega</label>
				  	<input class="input" type="text" name="bodega_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Direccion</label>
				  	<input class="input" type="text" name="bodega_ubicacion"  maxlength="200" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input class="input" type="text" name="bodega_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="150" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Telefono</label>
				  	<input class="input" type="text" name="bodega_telefono" pattern="0-9]{1,150}" maxlength="150" >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
					<label>Fecha de Ingreso</label>
				  	<input class="input" type="date" value=today name="bodega_fecha_ingreso" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}" maxlength="150" >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info">Guardar</button>
		</p>
	</form>
</div>