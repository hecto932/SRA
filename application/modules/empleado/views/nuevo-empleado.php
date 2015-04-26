  		<div class="container">
  		 	<div class="row">
        		<div class="col s12 m12 l12 ">
        			<div class="card">
        				<h3 class="center-align login-title white-text text-white deep-orange">Nuevo Empleado</h3>
        				<form id="form_nuevoEmpleado" class="col s12" action="empleado/empleadoNuevo" method="POST" enctype="multipart/form-data">
        					
        					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="first_name" type="text" class="validate" name="name" value="<?php echo set_value('name'); ?>">
					          <label for="first_name">Nombre</label>
					        </div>
					        <div class="input-field col s6">
					          <input id="cedula_empleado" type="number" class="validate" name="cedula" value="<?php echo set_value('cedula'); ?>">
					          <label for="first_name">Cedula</label>
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
        			<?php echo form_error('cedula'); ?>
        			<?php echo form_error('email'); ?>
          		</div>
          	</div>
  		</div>
