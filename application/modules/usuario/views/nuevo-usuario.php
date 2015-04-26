<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo base_url(); ?>">
		<meta charset="utf-8">
	    <!--Let browser know website is optimized for mobile-->
   		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

   		<title><?php echo $titulo; ?></title>

	   	<!--Import materialize.css-->
	   	<link type="text/css" rel="stylesheet" href="../assets/back/css/materialize.min.css"  media="screen,projection"/>
	   	<link rel="stylesheet" href="../assets/back/css/styles.css">

	</head>
    <body>
    	<header>
    		<nav>	
			    <div class="nav-wrapper blue darken-1 z-depth-1">
			      <a href="back_home.html" class="brand-logo logo-sra">SRA</a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="#">Inicio</a></li>
			        <li>
			        	<a class="dropdown-button" href="#!" data-activates="empleados">
	 					Empleados <i class="mdi-navigation-arrow-drop-down right"></i>
			        	</a>
			        	<!-- Dropdown Structure -->
						<ul id="empleados" class="dropdown-content">
						  <li><a class="blue-text text-blue" href="#!">Nuevo</a></li>
						  <li class="divider"></li>
						  <li><a class="blue-text text-blue" href="usuario/logOut">Ver todos</a></li>
						</ul>
			        </li>
			        <li><a href="#">Reportes</a></li>
			        <li>
			        	<a class="dropdown-button" href="#!" data-activates="usuarios">
	 					Usuarios <i class="mdi-navigation-arrow-drop-down right"></i>
			        	</a>
			        	<!-- Dropdown Structure -->
						<ul id="usuarios" class="dropdown-content">
						  <li><a class="blue-text text-blue" href="usuario/nuevoUsuario">Nuevo</a></li>
						  <li class="divider"></li>
						  <li><a class="blue-text text-blue" href="usuario/logOut">Ver todos</a></li>
						</ul>
			        </li>
			        <li>
			        	<a class="dropdown-button" href="#!" data-activates="usuario">
			        		<?php echo $usuario['name']; ?><i class="mdi-navigation-arrow-drop-down right"></i>
			        	</a>
			        	<!-- Dropdown Structure -->
						<ul id="usuario" class="dropdown-content">
						  <li><a class="blue-text text-blue" href="#!">Mi perfil</a></li>
						  <li class="divider"></li>
						  <li><a class="blue-text text-blue" href="usuario/logOut">LogOut</a></li>
						</ul>
			        </li>
			      	
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        <li><a href="#">Incio</a></li>
			        <ul class="collapsible" data-collapsible="accordion">
						    <li>
						      	<a class="collapsible-header bold blue-text text-blue">Empleados</a>
						      	<div class="collapsible-body">
						      		<ul>
				                  		<li><a href="#">Nuevo</a></li>
				                  		<li><a href="usuario/logOut">Ver todos</a></li>
				                	</ul>
						      	</div>
						   	</li>
						</ul>
			        <li><a href="#">Reportes</a></li>
			        <ul class="collapsible" data-collapsible="accordion">
						    <li>
						      	<a class="collapsible-header bold blue-text text-blue">Usuarios></a>
						      	<div class="collapsible-body">
						      		<ul>
				                  		<li><a href="usuario/nuevoUsuario">Nuevo</a></li>
				                  		<li><a href="usuario/verUsuarios">Ver todos</a></li>
				                	</ul>
						      	</div>
						   	</li>
						</ul>
			        <ul class="collapsible" data-collapsible="accordion">
						    <li>
						      	<a class="collapsible-header bold blue-text text-blue"><?php echo $usuario['name']; ?></a>
						      	<div class="collapsible-body">
						      		<ul>
				                  		<li><a href="#">Mi Perfil</a></li>
				                  		<li><a href="usuario/logOut">Cerrar sesion</a></li>
				                	</ul>
						      	</div>
						   	</li>
						</ul>
			      </ul>
			    </div>
			  </nav>
    	</header>

  		<div class="container">
  		 	<div class="row">
        		<div class="col s12 m12 l12 ">
        			<div class="card">
        				<h3 class="center-align login-title white-text text-white deep-orange">Nuevo usuario</h3>
        				<form id="form_nuevoUsuario" class="col s12" action="usuario/usuarioNuevo" method="POST" enctype="multipart/form-data">
        				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="first_name" type="text" class="validate" name="name" value="<?php echo set_value('name'); ?>">
					          <label for="first_name">Nombre</label>
					          <?php echo form_error('name'); ?>
					        </div>
					        <div class="input-field col s6">
					          <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>">
					          <label for="email">Email</label>
					          <?php echo form_error('email'); ?>
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
    	
      	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/materialize.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/mainApplication.js"></script>
    </body>
</html>