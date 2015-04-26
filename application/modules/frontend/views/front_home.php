<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <!--Let browser know website is optimized for mobile-->
   		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

   		<title>Home</title>

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
	  		<h4 id="demo" class="green-text text-green center-align"></h4>
    	</header>
    	<section class="container">
  		 	<div class="row">
        		<div class="col s12 m12 l12 ">
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
  		</section>
    	
      	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/materialize.min.js"></script>
      	<script type="text/javascript" src="../assets/back/js/mainApplication.js"></script>
    </body>
</html>