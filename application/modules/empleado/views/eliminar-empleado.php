<div class="container">
 	<div class="row">
			<div class="col s12 m8 l8 offset-m2  offset-l2">
			<h3 class="center-align login-title white-text text-white deep-orange">Eliminar empleado</h3>
				<div class="card">
		              <?php if(!empty($empleado['image'])): ?>
						<center><img width="140" class="circle img-responsive"src="assets/back/upload/avatar/<?php echo $empleado['image']; ?>"></center>
		              <?php endif; ?>
		            <div class="card-content">
		              <p><strong>Nombre: </strong><?php echo $empleado['name']; ?></p>
		              <p><strong>Cedula: </strong><?php echo $empleado['cedula']; ?></p>
		            </div>
		            <div class="card-action">
		              <a href="empleado/verEmpleados">Volver</a>
		              <a href='empleado/empleadoEliminado/<?php echo $empleado['slug']; ?>'>Eliminar empleado</a>
		            </div>
		          </div>
			</div>
	</div>
</div>
 