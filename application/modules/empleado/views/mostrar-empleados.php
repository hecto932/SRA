<div class="container">
 	<div class="row">
	<div class="col s12 m12 l12 ">
		<h5>Empleados</h5>
		<?php if(!empty($empleados)): ?>
			
				<form>
			 		<input type="text" name="buscar" placeholder="Buscar">
				</form>
					<div class="card">
      				<table>
				        <thead>
				          <tr>
				          	  <th data-field="id">Id</th>
				              <th data-field="price">Nombre</th>
				              <th data-field="price">Cedula</th>
				              <th>Acciones</th>
				          </tr>
				        </thead>
					
				        <tbody>
				        <?php foreach($empleados as $key => $value): ?>
					          <tr>
					          	<td><?php echo $value['id']; ?></td>
					            <td><?php echo $value['name']; ?></td>
					            <td><?php echo $value['cedula']; ?></td>
					            <td><a href="empleado/actualizarEmpleado/<?php echo $value['slug']; ?>"><i class="mdi-editor-border-color	"></i></a> <a href="empleado/eliminarEmpleado/<?php echo $value['slug']; ?>"><i class="mdi-action-delete"></i></a></td>
					          </tr>
				          <?php endforeach; ?>
				        </tbody>
				    </table>
				</div>
				<a href="reporte/generar"class="waves-effect waves-light btn">Descargar lista de empleados</a>
		<?php else: ?>
			<form>
			 <input type="text" name="buscar" placeholder="Buscar">
		</form>
			<div class="card">
				<table>
		        <thead>
		          <tr>
		          	  <th data-field="id">Id</th>
		              <th data-field="price">Nombre</th>
		              <th data-field="price">Cedula</th>
		              <th>Acciones</th>
		          </tr>
		        </thead>

		        <tbody>
		          <tr>
		          	<td>No hay empleados registrados!</td>
		          </tr>
		        </tbody>
		    </table>
		</div>
		<?php endif; ?>
		</div>
	</div>
</div>
 