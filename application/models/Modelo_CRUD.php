			<?php
			defined('BASEPATH') OR exit('No direct script access allowed');
			class Modelo_CRUD extends CI_Model{
			protected $db;
			function __Construct(){
			
			parent::__Construct();
			$this->db  = $this->load->database('blog',TRUE);
			
			}
			function insertar($ARRAY){
			
			//lo bonito de insert active records, es que podemos pasar un array para la creacion de la query
			//es importante asociar la llave del array con el nombre de la tabla dentro de nuestra db
			//en este caso, el array que viene desde el controlador es el mismo $_POST de nuestra vista
			$consulta =$this->db->insert('blog_posts',$ARRAY);
			//en este caso, vamos a enviar un true o false, para validar en nuestro modelo
			if($consulta==true){
			return true;
			}else{
			return false;
			}
			}
			function eliminar($ID){
			$consulta =$this->db->delete('blog_posts',array('ID_POST'=>$ID));
			if($consulta==true){
			return true;
			}else{
			return false;
			}
			}
			function consultar($NOMBRE_COLUMNA,$VALOR){
			 $resultado = $this->db->where($NOMBRE_COLUMNA,$VALOR);
			 $resultado = $this->db->get('blog_posts');
			 return $resultado->result();
			}
			function modificar($ID_POST,$ARRAY){
            $consulta= $this->db->where('ID_POST',$ID_POST);
            $consulta = $this->db->update('blog_posts',$ARRAY);
			if($consulta==true){
			return true;
			}else{
			return false;
			}
			}
			
			
			function consultar_todo(){
			
			$resultado =$this->db->get('blog_posts');
			return $resultado->result();
			}
			
			
			
			}