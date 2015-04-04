<div class="container">
 	<div class="row">
			<div class="col s12 m8 l8 offset-m2  offset-l2">
			<h3 class="center-align login-title white-text text-white deep-orange">Eliminar usuario</h3>
				<div class="card">
		              <?php if(!empty($usuario['image'])): ?>
						<center><img width="140" class="circle img-responsive"src="assets/back/upload/avatar/<?php echo $usuario['image']; ?>"></center>
		              <?php endif; ?>
		            <div class="card-content">
		              <p><strong>Nombre: </strong><?php echo $usuario['name']; ?></p>
		              <p><strong>Email: </strong><?php echo $usuario['email']; ?></p>
		            </div>
		            <div class="card-action">
		              <a href="usuarios/verUsuarios">Volver</a>
		              <a href='usuario/usuarioEliminado/<?php echo $usuario['slug']; ?>'>Eliminar usuario</a>
		            </div>
		          </div>
			</div>
	</div>
</div>
 