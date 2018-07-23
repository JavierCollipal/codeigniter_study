var cuerpo_operaciones = new Vue({
	el: '#cuerpo_operaciones',
	//lo basico de vue, el: hace referencia a la id de html donde operara vue
	//data hace referencia a los datos que conforman el json usado para interactuar con el servidor
	data:{
		//en la tabla y en caso de ser false, cargaremos nuestra tabla con la condicional v-if
		cargando_tabla: true,
     	hola:'hola soy un debug',
      //tabla nueva es un props, el cual es solamente un array asociativo pero en vue.js
     	tabla_nueva: {
         TITULO_POST: '',
         DESCRIPCION_POST: '',
         CONTENIDO_POST:''
      },
     	//tablas es nuestro principal array que interactua con el controlador
     	   tablas: []
		   
		},
		//cargando_tabla es usado como comprobante en v-if para verificar si realmente se realizaron cambios

methods: {
	//nuestra funcion CargarTabla usa axios, con el cual mediante.get indicamos la url personalizada de
	//nueastro metodo y funcion de este.
	CargarTabla: function(){
		//como vamos a realizar un cambio, setearemos cargando_tabla a true para poder recargar nuestro v-if
		this.cargando_tabla = true;
	  axios.get('tabla_entera')
      .then(response => {
      	//solo basta comprender que axios simplifica la creacion de estos pasos
      	//y mediante then(response) estamos asignando la data traida desde nuestro controlador a nuestro
      	//tablas
        this.tablas = response.data
        //paso final de este metodo, el cual al setear cargando_tabla en false, podemos recargar la
        //tabla correspondiente
			this.cargando_tabla = false;
		});
	},
    NuevaTabla: function(){
    //por motivos de tiempo, no alcanze a comprender axios.post en su totalidad
    //por lo tanto me dedico a trabajar con http.post en este caso
    //enviamos nuestros datos de json mediante axios.post
   this.$http.post('crear_tabla',this.tabla_nueva).then(function(){
      this.tabla_nueva.TITULO_POST = '';
      this.tabla_nueva.DESCRIPCION_POST = '';
     this.tabla_nueva.CONTENIDO_POST = '';
      this.CargarTabla();
   });
    },

    Eliminar_Posteo: function(ID_POST){
      //pasamos el array completo con post, pero de todos modos nuestro controlador solo solicita ID_post
      //el unico valor que nos interesa
    this.$http.post('borrar_posteo',ID_POST).then(function(){
      this.CargarTabla();
      }, function(){
            alert('No se ha podido eliminar el post.');
         });
    }
},
//el apartado created: nos sirve especificamente para cargar metodos al momento de instanciar vue
//en este caso CargarTabla, y con esto nos ahorramos de hacer trigger manual de esta
	 created: function(){
      this.CargarTabla();
   }
});
