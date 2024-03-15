<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="tbl_inv_equipos.id_prod,tbl_inv_equipos.marca,tbl_inv_equipos.modelo,tbl_inv_equipos.or_compra,tbl_inv_equipos.serie,tbl_inv_equipos.estado,tbl_inv_equipos.fecha_creacion,tbl_inv_equipos.fecha_salida,tbl_inv_equipos.id_usuario,tbl_inv_equipos.id_bodega,tbl_inv_equipos.id_tipo";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos = "SELECT $campos FROM tbl_inv_equipos 
		WHERE tbl_inv_equipos.marca LIKE '%$busqueda%' 
		OR tbl_inv_equipos.modelo LIKE '%$busqueda%' 
		ORDER BY tbl_inv_equipos.marca ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_prod) FROM tbl_inv_equipos";
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			   $tabla.='</p>
			        </figure>
			            <div class="content">
			              <p>
			                <strong>'.$contador.' - '.$rows['marca'].'</strong><br>
			                <strong>MODELO:</strong> '.$rows['modelo'].', <strong>ORDEN DE COMPRA:</strong> '.$rows['or_compra'].', <strong>SERIE:</strong> '.$rows['serie'].',
							<strong>ESTADO:</strong> '.$rows['estado'].', <strong>TIPO:</strong> '.$rows['id_tipo'].', <strong>FECHA DE ENTRADA:</strong> '.$rows['fecha_creacion'].', <strong>FECHA DE ÚLTIMA ACTUALIZACIÓN:</strong> '.$rows['fecha_salida'].'
			              </p>
			            </div>
			            <div class="has-text-right">
			                <a href="index.php?vista=product_update&product_id_up='.$rows['id_prod'].'" class="button is-success is-small">Actualizar</a>
			                <a href="'.$url.$pagina.'&product_id_del='.$rows['id_prod'].'" class="button is-danger is-small">Eliminar</a>
			            </div>
			    </article>

			    <hr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<p class="has-text-centered" >
					<a href="'.$url.'1" class="button is-link is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
		}else{
			$tabla.='
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
		}
	}

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}