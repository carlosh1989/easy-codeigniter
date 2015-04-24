<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

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

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Bienvenido a Easy-Codeigniter</h1>

	<div id="body">
		<p>Si ves esta pantalla quiere decir que ya tienes configurado todo como deberia de ser.</p>

		<p>Si tu quieres hacer un nuevo marco de proyecto posicionate
		primero en la raiz de tu carpeta de proyecto y luego ingresa el siguiente codigo:</p>
		<code>./tools/crear.sh controlador seccion vista</code>

		<p>En el codigo anterior despues del nombre del .sh tendra que ir 3 parametros, el primero es 
		el nombre del controlador o en su defecto el nombre del perfil por ejemplo: "personal", y el segundo parametro
		que ira sera la seccion, el cual llevara un orden porque creara carpetas y un modelo, por ejemplo: "login", el tercer y 
		ultimo parametro es donde ira el nombre de la funcion de la vista ejemplo: "ver"</p>

		<p>El siguiente paso seria correr el stylus para que vaya copilando los .styl creados y los lleve a la carpeta salida/ , dichos 
		archivos se encuentran la siguiente locación de la carpeta raíz: 
		</p>
		<code>
			assets/css/"nombre controlados"/"nombre de seccion"/"nombre de vista"
		</code>
		<p>
			Debes posicionarte con la terminal en la direccion anterior y correr este codigo:
		</p>
		<code>
			sudo stylus -w *.styl --out salida/
		</code>
		<p>
			-w hara que stylus este mirando que archivos cambiar dentro de esa carpeta, las copilara 
			y las enviara con extensión .css a la carpeta salida/.
		</p>

		<p>
			Luego de eso en el controlador creado automaticamente en este caso seria "personal", adentro tendra que crear una nueva función
			con los siguientes parametros:
		</p>
		<code>
			    public function login_ver() <br>
			    {<br>
			    &nbsp;&nbsp;	$this->recursos->theme('personal','login','ver',''); <br>
			    }
		</code>
		<p>
			En la función creada el nombre de la función sera el de su preferencia pero para mejor funcionamiento
			deberia ser el nombre de la "sección" y el nombre de la vista a mostrar en este caso "ver" juntas con un guion bajo, 
			para cargar la vista se hace uso de el controlador recursos el cual llama a la funcion "theme" en el cual tendra que llevar los siguientes parametros
			, el primero nombre del controlador "personal", el nombre de la sección "login" y el nombre de la vista "ver", el cuarto parametro se deja con comillas simple, pero
			se puede cambiar por y poner la variable de arreglo para pasar datos a la vista ejemplo "$data" el cual seria algo asi "$data['titulo']='eso es un titulo';".
		</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>