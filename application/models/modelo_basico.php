<?php 
//el modelo cumple con las base de encapsulacion en php POO donde private interactua solo en la clase base, protected permite solo a la clase misma y sus derivados interactuar y public le permite no tener restricciones
//la base de nuestro modelo parte por crear su clase y extendiendo la clase model en ella
//La primera letra del modelo siempre debe ser mayuscula
class Modelo_basico extends CI_Model{
	//al usar __construct estamos invocando el constructor de la clase base y no a de Modelo_basico
	//en php POO, al instanciar una clase podemos usar un constructor para asignarle nuevos valores a los atributos de esta sin tener que crear metodos para cambiarles sus valores.
    protected $db;
    function __construct(){
    //dato interesante. Extender model no implica que heredamos directamente su controlador y modelo_basico como clase hija debe declarar implicitamente el constructor de model para poder opera como tal
      parent::__construct();
      //es hora de asignar valor en el constructor mismo a db, para poder ser usada en toda la clase
  $this->db=$this->load->database('default',TRUE);
    }
   

//ya con los datos de nuestra base de datos ingresada en database.php y ademas el autoload.php modificado en $autoload['libraries'] proceso a crear mis funciones de modelo
    function ultimos_articulos(){
      
    	$query = "select * from articulo order by id desc limit 5";
    	return $this->db->query($query);
    }
    function un_articulo($id){
    //query para seleccionar un articulo por id
    $query = "select * from articulo where id=".$id;
    //ojo, en este caso interactuaremos con fetch array desde el mismo modelo
    //
    $rs = $this->db->query($query);
    //si el numero es mayor a 0, deberiamos tener un valor, de lo contrario arrojamos false
    if($rs->num_rows()==0){
      return false;
    }
    else
    {
    	//como solo queremos un valor $query->row(); nos queda como anillo en el dedo, ya que no necesitaremos un result_array ni menos recorrerlo con foreach	
       return $rs->row();
    }	
    }
//es momento de crear funciones crud, en las lineas anteriores, db actuo por default con esta tabla y base de datos llamada codeigniter
// podemos referenciar otra conexion usando esta linea $DB2 = $this->load->database('nombre', TRUE);

}