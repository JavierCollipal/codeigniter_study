<?php 
defined('BASEPATH') or exit('no direct script acces allowed');

class Modelos extends CI_Controller{
	public function index(){

	//cargamos el helper de url, el cual tiene funciones para trabajos de URL
    $this->load->helper('url');
	//la forma de cargar un modelo es simple, ocupamos el metodo model de nuestro load
	$this->load->model('modelo_basico');
	//tambien podemos llamar varios modelos con un array
	//$this->load->model(array('x','y')); 
	//luego para acceder a ellos bastara con usar $this->nombre_modelo->su_funcion

    //si queremos metodos que se inicien concualquier solicitud de pagina web, basta con ir a autoload.php y modificar la variable $autoload['model']

    //es momento de pedir los ultimos articulos, crearemos una variable que asimilara al mysqli_result
    $UltimosArticulos = $this->modelo_basico->ultimos_articulos();
    //es momento de crear un array,el cual pasara a la vista con nuestros articulos
    $datos_vista = array('ultimos_articulos' => $UltimosArticulos);
    //cargo la vista con el array
    $this->load->view('modelos_varios',$datos_vista);
	}
	//con esta funcion interactuamos directamente con lo creado por site_url en nuestra vista de modelos_varios, la combinacion de helper url dentro de un href nos resulta super util para llamar funciones del controlador y insertarle valores
	function muestra($id){
		$this->load->helper('url');
		//cargamos el modelo, el cual ya esta dentro de autoload, pero es bueno usarlo como ejemplo
		$this->load->model('modelo_basico');
		//pedimos el articulo deseado
		$ArrayArticulo = $this->modelo_basico->un_articulo($id);
		//comprobamos si recibimos el articulo
		if(!$ArrayArticulo){
			//no recibimos ningun articulo
			//lanzaremos un 404
			show_404();
		}
		else{
			//encontramos el articulo
			//procedemos a mostrar una vista de este con su vista
			$datos_articulo = array('un_articulo' =>$ArrayArticulo);
			$this->load->view('muestra_de_articulo',$datos_articulo);
		}
	}

}