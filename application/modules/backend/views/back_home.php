<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo base_url(); ?>">
		<meta charset="utf-8">
	    <!--Let browser know website is optimized for mobile-->
   		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

   		<title><?php $titulo; ?></title>

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
						  <li><a class="blue-text text-blue" href="usuario/verUsuarios">Ver todos</a></li>
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
				                  		<li><a href="usuario/logOut">Ver todos</a></li>
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
	  		<h3 class="center-align">Sistema de Registro Asistencial</h3>
    	</header>

  		<div class="container">
  		 	<div class="row">
        		<div class="col s12 m12 l12 ">
        			<h5>Reporte del dia</h5>
        			<form>
						 <input type="text" name="buscar" placeholder="Buscar">
        			</form>
          			<div class="card">
          				<table>
					        <thead>
					          <tr>
					          	  <th data-field="id">Nº</th>
					              <th data-field="price">Acción</th>
					              <th data-field="id">Nombre</th>
					              <th>Cedula</th>
					              <th data-field="name">Hora</th>
					          </tr>
					        </thead>

					        <tbody>
					          <tr>
					          	<td >5</td>
					            <td><span style="padding:0.5em; border-radius:7px; margin:0;" class="green white-text">Entrada</span></td>
					            <td>Eclair</td>
					            <td>20162504</td>
					            <td>14:15</td>
					          </tr>
					          <tr>
					          	<td>4</td>
					            <td><span style="padding:0.5em; border-radius:7px; margin:0;" class="deep-orange white-text">Salida</span></td>
					            <td>Jellybean</td>
					            <td>20162504</td>
					            <td>14:20</td>
					          </tr>
					          <tr>
					          	<td>3</td>
					            <td><span style="padding:0.5em; border-radius:7px; margin:0;" class="green white-text">Entrada</span></td>
					            <td>Lollipop</td>
					            <td>20162504</td>
					            <td>22:15</td>
					          </tr>
					          <tr>
					          	<td>2</td>
					            <td><span style="padding:0.5em; border-radius:7px; margin:0;" class="deep-orange white-text">Salida</span></td>
					            <td>Lollipop</td>
					            <td>20162504</td>
					            <td>23:15</td>
					          </tr>
					          <tr>
					          	<td>1</td>
					            <td><span style="padding:0.5em; border-radius:7px; margin:0;" class="green white-text">Entrada</span></td>
					            <td>Eclair</td>
					            <td>20162504</td>
					            <td>23:15</td>
					          </tr>
					        </tbody>
					    </table>
					</div>
          		</div>
          	</div>
  		</div>
    	
      	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/materialize.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/mainApplication.js"></script>
    </body>
</html>