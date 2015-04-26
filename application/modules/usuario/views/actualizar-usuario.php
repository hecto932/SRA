<div class="container">
<div class="row">
	<div class="col s12 m12 l12 ">
		<div class="card">
			<h3 class="center-align login-title white-text text-white deep-orange">Actualizar usuario</h3>
			<?php if(!empty($usuario['image'])): ?>
				<center><img style="  width: 120px;margin: 1em;"class="circle responsive-img" src="assets/back/upload/avatar/<?php echo $usuario['image']; ?>"></center>
			<?php endif; ?>
			<form id="form_nuevoUsuario" class="col s12" action="usuario/usuarioActualizado" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				<input type="hidden" name="usuario_id" value="<?php echo $usuario['id']; ?>">
		      <div class="row">
		        <div class="input-field col s6">
		          <input id="first_name" type="text" class="validate" name="name" value="<?php echo set_value('name', $usuario['name']); ?>">
		          <label for="first_name">Nombre</label>
		        </div>
		        <div class="input-field col s6">
		          <input id="email" type="text" name="email" value="<?php echo set_value('email', $usuario['email']); ?>">
		          <label for="email">Email</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input id="password" type="password" name="pass" class="validate">
		          <label for="password">Contraseña</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input id="password" type="password" name="repass" class="validate">
		          <label for="password">Repita la contraseña</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="col s12">
		        	<div class="file-field input-field">
				      <input class="file-path validate" type="text"/>
				      <div class="btn">
				        <span>Foto</span>
				        <input type="file" name="pic" accept="image/*">
				      </div>
				    </div>
		        </div>
		      </div>
		      <button class="btn waves-effect waves-light btn-large center-align col s12 grey" type="submit">Guardar
			    <i class="mdi-content-save right"></i>
			  </button>
		    </form>
		</div>
		<?php if(isset($image)) echo $image; ?>
		<?php echo form_error('name'); ?>
		<?php echo form_error('email'); ?>
		<?php echo form_error('pass'); ?>
		<?php echo form_error('repass'); ?>
		</div>
	</div>
</div>