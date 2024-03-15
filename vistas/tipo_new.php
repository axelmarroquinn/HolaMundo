<div class="container is-fluid mb-6">
	<h1 class="title">Administracion de Equipo</h1>
	<h2 class="subtitle">Registro de nuevo tipo</h2>
</div>

<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/tipo_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Descripcion de tipo</label>
				  	<input class="input" type="text" name="equipo_desc" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required >
				</div>
		  	</div>		  	
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info">Guardar</button>
		</p>
	</form>
</div>