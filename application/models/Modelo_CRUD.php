			<?php
			defined('BASEPATH') OR exit('No direct script access allowed');
			class Modelo_CRUD extends CI_Model{
			protected $db;
			function __Construct(){
			
			parent::__Construct();
			$this->db  = $this->load->database('blog',TRUE);
			//v2.0 la cual comprende vue y MVC, se mejoro la practica de llamar a this, ahora solo basta con llamarla una vez y usar sus metodos multiples veces si es requerido
			}
			function insertar($ARRAY){
			
			//lo bonito de insert active records, es que podemos pasar un array para la creacion de la query
			//es importante asociar la llave del array con el nombre de la tabla dentro de nuestra db
			//en este caso, el array que viene desde el controlador es el mismo $_POST de nuestra vista
			//2.0 vue y MVC
			//es hora de modificar un poco insert, con el json entrante crearemos directamente un nuevo array dentro de insert, donde los datos seran sacados de nuestro json
			$this->db->insert('blog_posts',array(
				'TITULO_POST'=>$ARRAY['TITULO_POST'],
				'DESCRIPCION_POST'=>$ARRAY['DESCRIPCION_POST'],
			    'CONTENIDO_POST'=>$ARRAY['CONTENIDO_POST']));
			}
			function eliminar($ARRAY){
			$this->db->where('ID_POST',$ARRAY['ID_POST'])->delete('blog_posts');
			}
			function consultar($NOMBRE_COLUMNA,$VALOR){
			 
			 return  $this->db->where($NOMBRE_COLUMNA,$VALOR)->db->get('blog_posts')->result();
			}
			function modificar($ID_POST,$ARRAY){
            //queda pendiente modificar, donde pienso mostrar una ventana tipo modal para realizar los cambios
          			}
			
			
			function consultar_todo(){

			return $this->db->get('blog_posts')->result();
			}
			
			
			
			}