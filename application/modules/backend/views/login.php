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
	    		<div class="nav-wrapper blue darken-1">
	      			<a href="/" class="brand-logo center"><strong>SRA</strong></a>
	    		</div>
	  		</nav>
	  		<h3 class="center-align">Sistema de Registro Asistencial</h3>
    	</header>

  		<div class="container">
  		 	<div class="row">
        		<div class="col s12 m8 l6 offset-m2 offset-l3">
          			<div class="card">
          				<h3 class="center-align login-title white-text text-white deep-orange">Iniciar sesión</h3>
					  <form class="col s12" action="usuario/login" method="post">
					  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					      <div class="input-field col s12">
					        <i class="mdi-action-account-circle prefix"></i>
					        <input id="icon_prefix" type="email" name="email" class="validate">
					        <label for="icon_prefix">Correo electrónico</label>
					      </div>
					      <div class="input-field col s12">
					        <i class="mdi-communication-vpn-key prefix"></i>
					        <input id="icon_telephone" type="password" name="password" class="validate">
					        <label for="icon_telephone">Contraseña</label>
					      </div>
						  <button class="btn waves-effect waves-light btn-large center-align col s12 grey" type="submit">Iniciar
						    <i class="mdi-content-send right"></i>
						  </button>
					  </form>
					</div>
					<?php echo form_error('email'); ?>
					<?php echo form_error('password'); ?>
					<!--
					<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i> Error</div>
					<div class="card-panel green white-text center-align"><i class="mdi-navigation-check"></i> Acceso permitido</div>
					-->
          		</div>
          	</div>
  		</div>
    	
      	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/materialize.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/mainApplication.js"></script>
    </body>
</html>