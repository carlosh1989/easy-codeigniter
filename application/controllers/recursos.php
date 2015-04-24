<?php
class Recursos extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('instrucciones');
	}

	public function magic_vista($perfil,$funcion,$vista,$data)
	{
		$this->crear_vista($perfil,$funcion,$vista);
		$this->theme($perfil,$funcion,$vista,$data);
	}

	public function sms($tipo,$mensaje)
	{
		$this->session->set_flashdata('sms', $mensaje);
		$this->session->set_flashdata('tipo_sms',$tipo);
	}

	public function theme($perfil,$funcion,$vista,$data)
	{
		$data['estilo'] = $perfil.'/'.$funcion.'/salida/'.$vista;
		$data['bloque'] = $this->load->view(''.$perfil.'/'.$funcion.'/'.$vista.'',$data, TRUE);
		$this->load->view('theme/'.$perfil.'/estandar',$data);
	}

	public function destroy()
	{
		$this->session->session_destroy();
	}

	public function redi($perfil)
	{
		$perfil_session = $this->session->userdata('perfil');
		if ($perfil_session == $perfil) 
		{
			
		}
		else
		{
			redirect(base_url());
		}
	}


	public function crear_vista()
	{
		$perfil = $this->uri->segment(3);
		$funcion = $this->uri->segment(4);
		$vista = $this->uri->segment(5);

	$carpeta_tema = './application/views/theme/';
	$carpeta_tema_perfil = './application/views/theme/'.$perfil.'';
	$theme_php = './application/views/theme/'.$perfil.'/estandar.php';
	$carpeta_perfil = './application/views/'.$perfil.'/';
	$carpeta_funcion = './application/views/'.$perfil.'/'.$funcion.'/';
	$vista_php = './application/views/'.$perfil.'/'.$funcion.'/'.$vista.'.php';
	$public_function = $perfil.'/'.$funcion.'/'.$vista;

	//CARPERTA DE THEME PERFIL
	if (!file_exists($carpeta_tema) && !is_dir($carpeta_tema)) 
	{
	    mkdir($carpeta_tema,0777); 
		chmod($carpeta_tema, 0777);  
		//echo "Carpeta de perfil ".$perfil." creada en views..!<hr>";    
	} 


	//CARPERTA DE THEME PERFIL
		if (!file_exists($carpeta_tema_perfil) && !is_dir($carpeta_tema_perfil)) 
		{
	    	mkdir($carpeta_tema_perfil,0777); 
			chmod($carpeta_tema_perfil, 0777);  
			//echo "Carpeta de perfil ".$perfil." creada en views..!<hr>";    
		} 
	
	//ARCHIVO DE THEME
		if (!file_exists('./application/views/theme/'.$perfil.'/estandar.php') && !is_dir('./application/views/theme/'.$perfil.'/estandar.php')) 
		{
	    	$php = fopen('./application/views/theme/'.$perfil.'/estandar.php', "a+");
	    	fputs($php, "<!DOCTYPE");
	    	fputs($php, " html>"."\n");
			fputs($php, "<html");
			fputs($php, " lang='en'>"."\n");
			fputs($php, " <head");
			fputs($php, ">"."\n");
			fputs($php, "    <link rel='stylesheet' type='text/css' href='<");
			fputs($php, "?=base_url()?>assets/css/<");
			fputs($php, "?php echo $");
			fputs($php, "estilo ?>.css'/>"."\n");
			fputs($php, "	<script src=");
			fputs($php, "http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js");
			fputs($php, "></script>"."\n");
			fputs($php, "    <meta charset='UTF-8'");
			fputs($php, ">"."\n");
			fputs($php, "    <title");
			fputs($php, ">");
			fputs($php, "");
			fputs($php, "</title");
			fputs($php, ">"."\n");
			fputs($php, "<body");
			fputs($php, ">"."\n");
			fputs($php, "	<header");
			fputs($php, ">"."\n");
			fputs($php, "	</header");
			fputs($php, ">"."\n");
	    	fputs($php, "		<?");
	    	fputs($php, "=");
	    	fputs($php, "$");
	    	fputs($php, "bloque;");
	    	fputs($php, "?>"."\n");
	    	fputs($php, "	<footer");
			fputs($php, ">"."\n");
			fputs($php, "	</footer");
			fputs($php, ">"."\n");
	    	fputs($php, "</body"); 
	    	fputs($php, ">"."\n");
	    	fputs($php, "</html");
	    	fputs($php, ">"."\n");
	     
			fclose($php);
			chmod('./application/views/theme/'.$perfil.'/estandar.php', 0777); 
			//echo "vista ".$vista." de ".$funcion." creada en views..!<META http-equiv='refresh' content='0;'>";
		}

	
	//CARPERTA DE PERFIL
		if (!file_exists($carpeta_perfil) && !is_dir($carpeta_perfil)) 
		{
	    	mkdir($carpeta_perfil,0777); 
			chmod($carpeta_perfil, 0777);  
			//echo "Carpeta de perfil ".$perfil." creada en views..!<hr>";    
		}


	//CARPETA DE FUNCION
		if (!file_exists($carpeta_funcion) && !is_dir($carpeta_funcion)) 
		{
	    	mkdir($carpeta_funcion,0777); 
			chmod($carpeta_funcion, 0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
		} 

	//PHP DE VISTA
		if (!file_exists($vista_php)) 
		{
	    	$php = fopen($vista_php, "a+");
	    	fputs($php, " vista ".$funcion." ".$vista.""); 
			fclose($php);
			chmod($vista_php, 0777); 
			//echo "vista ".$vista." de ".$funcion." creada en views..!<META http-equiv='refresh' content='0;'>";
			echo "<META http-equiv='refresh' content='0;'>";
			$mensaje = "vista ".$vista." de ".$funcion." creada en views..!";
			$this->session->flashdata('correr_stylus','correr_stylus');	
			$this->sms('ok',$mensaje);   
		}
		$carpeta_assets = "./assets/";
		$carpera_css = "./assets/css";
		$carpeta_tema_css = './assets/css/theme/';
		$archivo_tema_css = './assets/css/theme/'.$perfil.'.styl';
		$carpeta_recursos_css = './assets/css/recursos/';
		$archivo_recursos_css = './assets/css/recursos/todos.styl';
		$folder_css =  "./assets/css/".$perfil."/";
		$carpeta_css = "./assets/css/".$perfil."/".$funcion."/";
		$folder_salida =  "./assets/css/".$perfil."/".$funcion."/salida/";
		$archivo_css = "./assets/css/".$perfil."/".$funcion."/".$vista.".styl";
		$archivo_html = "./application/views/".$perfil."/".$funcion."/".$vista.".php";
		$folder_css_funcion = "./assets/css/".$perfil."/".$funcion."/";
		
		//CARPETA ASSETS
		if (!file_exists($carpeta_assets) && !is_dir($carpeta_assets)) 
		{
	    	mkdir($carpeta_assets,0777); 
			chmod($carpeta_assets,0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";

			//CARPETA DE CSS FUNCION
			if(!file_exists($carpera_css) && !is_dir($carpera_css)) 
			{
		    	mkdir($carpera_css,0777); 
				chmod($carpera_css, 0777); 
				//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
			}      
		} 

		
		
		//CARPETA DE CSS PERFIL
		if (!file_exists($folder_css) && !is_dir($folder_css)) 
		{
	    	mkdir($folder_css,0777); 
			chmod($folder_css, 0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
		} 

		//CARPETA DE CSS FUNCION
		if (!file_exists($folder_css_funcion) && !is_dir($folder_css_funcion)) 
		{
	    	mkdir($folder_css_funcion,0777); 
			chmod($folder_css_funcion, 0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
		} 


		//ADENTRO DE CSS PERFIL LA CARPETA SALIDA
		if (!file_exists($folder_salida) && !is_dir($folder_salida)) 
		{
	    	mkdir($folder_salida,0777); 
			chmod($folder_salida, 0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
		} 

		
		//CSS DE VISTA
		if (!file_exists($archivo_css)) 
		{
	     	$css = fopen($archivo_css, "a+");
	     	fputs($css, "@import '../../theme/".$perfil.".styl'");
	     	//fputs($css, "@import '../../themes/".$perfil.".styl'");
			fclose($css);
			chmod($archivo_css, 0777); 
			//$this->stylus($perfil,$funcion,$vista); 
			//echo "vista ".$vista." de perfil ".$perfil." creada con exito..!";
		}
	


		//CARPETA THEME CSS
		if (!file_exists($carpeta_tema_css) && !is_dir($carpeta_tema_css)) 
		{
	    	mkdir($carpeta_tema_css,0777); 
			chmod($carpeta_tema_css, 0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
		} 

		//CSS DE THEME
		if (!file_exists($archivo_tema_css)) 
		{
	     	$css = fopen($archivo_tema_css, "a+");
	     	fputs($css, "@import '../recursos/todos.styl'");
			fclose($css);
			chmod($archivo_tema_css, 0777); 
			//$this->stylus($perfil,$funcion,$vista); 
			//echo "vista ".$vista." de perfil ".$perfil." creada con exito..!";
		}

		//CARPETA CSS RECURSOS
		if (!file_exists($carpeta_recursos_css) && !is_dir($carpeta_recursos_css)) 
		{
	    	mkdir($carpeta_recursos_css,0777); 
			chmod($carpeta_recursos_css, 0777); 
			//echo "Carpeta de funcion ".$funcion." creada en views..!<hr>";     
		} 

		//CSS DE THEME
		if (!file_exists($archivo_recursos_css)) 
		{
	     	$css = fopen($archivo_recursos_css, "a+");
	     	fputs($css, "");
	     	fputs($css, "");
			fclose($css);
			chmod($archivo_recursos_css, 0777); 
			//$this->stylus($perfil,$funcion,$vista); 
			//echo "vista ".$vista." de perfil ".$perfil." creada con exito..!";
		}
	
		$perfil = $perfil;
		$funcion = $funcion;
		$vista = $vista;

		$controlador = "./application/controllers/".$perfil.".php";

		//CREANDO CONTROLADOR 
		if (!file_exists($controlador)) 
		{
	     	$co = fopen($controlador, "a+");
	     	fputs($co, "<?php");
	     	fputs($co,"\n");
	     	fputs($co, "class ".ucwords(strtolower($perfil))." extends CI_Controller {" . "\n");
	     	fputs($co, "    " . "\n");
	     	fputs($co, "    " . "\n");
	     	fputs($co, "    public function __construct() {" . "\n");
	     	fputs($co, "        parent::__construct();" . "\n");
	     	fputs($co, "        $");
	     	fputs($co, "this");
	     	fputs($co, "->load->library('../controllers/recursos');" . "\n");
	     	fputs($co, "    }" . "\n");
	     	fputs($co, "    " . "\n");
	     	fputs($co, "    " . "\n");
	     	fputs($co, "}" . "\n");

			fclose($co);
			chmod($controlador, 0777); 
			//$this->stylus($perfil,$funcion,$vista); 
			//echo "vista ".$vista." de perfil ".$perfil." creada con exito..!";
		}
	
	}

	public function crear_modelo($perfil,$funcion,$vista)
	{
		$modelo = "./application/models/".$perfil."/".$funcion."_model.php";
		$carpeta_modelo = "./application/models/".$perfil."";

		//CARPERTA DE MODELO
		if (!file_exists($carpeta_modelo) && !is_dir($carpeta_modelo)) 
		{
	    	mkdir($carpeta_modelo,0777); 
			chmod($carpeta_modelo, 0777);  
			//echo "Carpeta de perfil ".$perfil." creada en views..!<hr>";    
		}


		//CREANDO MODELO  DE FUNCION
		if (!file_exists($modelo)) 
		{
	     	$mo = fopen($modelo, "a+");
	     	fputs($mo, "<?php");
	     	fputs($mo, " if ( ! defined('BASEPATH')) exit('No direct script access allowed');" . "\n");
	     	fputs($mo, "    " . "\n");
	     	fputs($mo, "class ".ucwords(strtolower($funcion))."_model extends CI_Model {"."\n");
	     	fputs($mo, "    " . "\n");
	     	fputs($mo, "    public function __construct() {" . "\n");
	     	fputs($mo, "        parent::__construct();" . "\n");
	     	fputs($mo, "    " . "\n");
	     	fputs($mo, "    " . "\n");
	     	fputs($mo, "    " . "\n");
	     	fputs($mo, "    }" . "\n");
	     	fputs($mo, "}" . "\n");

			fclose($mo);
			chmod($carpeta_modelo, 0777); 
			//$this->stylus($perfil,$funcion,$vista); 
			//echo "vista ".$vista." de perfil ".$perfil." creada con exito..!";
		}
		else
		{
			
		}
	}

	public function stylus($perfil,$funcion,$vista)
	{
		system('./script.sh '.$perfil.' '.$funcion.' '.$vista);
		//echo "hecho";
		//echo getcwd() . "\n";
	}

	public function open()
	{
		//system('gulp open');
		echo "hola";
	}
}