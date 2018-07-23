<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
	</style>
</head>
<body>
<div id="container">
	<h1>

	</h1>
</div>
<div id="container">
	<h1>Bienvenido a nuestro ambiente de CRUD!</h1>
    <h1>Estos son todos los posteos actualmente en el blog</h1>
	<div id="body">
<div id="cuerpo_operaciones" class="col-sm-8 text-left"> 
     
       <div v-if="cargando_tabla"> Cargando lista de tareas… </div>
<table v-if="!cargando_tabla">
   <h1>{{hola}}</h1>
    <thead>
        <tr>
        <th>ID Post</th>
        <th>Titulo Post</th>
        <th>Descripcion Post</th>
        <th>Contenido Post</th>
        <th>Fecha Post</th>
        <th>Botones</th>
        <tr>
        </tr>
    </thead>
    <!--thread y tbody solo cumplen como ''tag'' y son parte de html--> 
    <tbody>
    <!--empezamos la parte interesante de vue rellenando nuestra tabla que selecciona toda la table desde sql sin usar php-->
    <!--empezamos por la base, v-for de vue directamente remplaza a foreach de php y :key es un indicativo de donde esta cada item al momento de realizar cambio, ahorrandose reusar y volver a ordenar los elementos actuales.-->
      <tr v-for="load in tablas">
         <td>{{ load.ID_POST}}</td>
         <td>{{ load.TITULO_POST}}</td>
         <td>{{ load.DESCRIPCION_POST}}</td>
         <td>{{ load.CONTENIDO_POST }}</td>
         <td>{{ load.FECHA_POST }}</td>
         <td>
             <!--Ocupamos los mimis trigger de js pero en este caso v- nos facilitara mucho mas las cosas
                llamando al trigger correpondiente v-on y luego al metodo-->
         <button v-on:click="Eliminar_Posteo(load)">Eliminar</button>
         </td>
       </tr> 
     
    </tbody>
    </table>
    
    
	

	<h1>Si deseas insertar nuevos registros!</h1>
     <h2>Insertar Posts</h2>
     <!--con .prevent estamos evitando que la funcio nos recarge la pagina-->
<form v-on:submit.prevent="NuevaTabla" method="post">
     <h1>{{hola}}</h1>
<div class="row">
      <div class="col-25">
        <label for="titulo">Titulo</label>
      </div>
      <div class="col-75">
        <input type="text" v-model="tabla_nueva.TITULO_POST"   placeholder="Escribe el titulo de tupost..">
         </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Descripcion</label>
      </div>
      <div class="col-75">
      <textarea   v-model="tabla_nueva.DESCRIPCION_POST" placeholder="Describe el post.." style="height:200px"></textarea>  </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Contenido</label>
      </div>
     <div class="col-75">
       <textarea   v-model="tabla_nueva.CONTENIDO_POST" placeholder="Redacta el post.." style="height:200px"></textarea> </div>
    
    </div>
    <div class="row">
    <button type="submit">Crear</button>
    </div>
</form>
</div>
</div>
</div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue-resource.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue-crud.js"></script>
</body>
</html>