#!/bin/bash

# -*- ENCODING: UTF-8 -*-

echo "

"
#NOMBRE DE CARPETA DE "proyecto" EN LINEAS  #12 #14 #68 #97 #119 
toilet Crear-Vista -f future
cd ..
sudo chmod 777 -R proyecto 
cd proyecto

curl http://127.0.0.1/proyecto/recursos/crear_vista/$1/$2/$3
sudo chmod 777 -R application/models



echo    ""

echo -e '\E[37;44m'"\033[5m| CARPETA PERFIL "$1" CREADA |\033[0m" 
echo    ""

echo -e '\E[37;44m'"\033[5m| CARPETA THEME "$1" CREADA |\033[0m"
echo    ""

echo -e '\E[37;44m'"\033[5m| CARPETA SECCION "$2" CREADA |\033[0m" 
echo    ""

echo -e '\E[37;44m'"\033[5m| PHP "$3" CREADO |\033[0m"
echo    ""

echo -e '\E[37;44m'"\033[5m| STYLUS "$3" CREADO |\033[0m" 
echo    ""

cd assets/css/$1/$2


sudo stylus -c *.styl --out salida/
ls
echo    ""
echo -e '\E[37;42m'"\033[5m| CSS "$3" COMPILADO |\033[0m" 
echo    ""
cd ..
cd ..
cd ..
cd ..

if [ -f application/models/$1/$2_model.php ]
then
				echo    ""
				echo -e '\E[37;42m'"\033[5m| MODELO CREADO |\033[0m" 
				echo    ""
else
	cmd=(dialog --keep-tite --menu "Deseas crear Modelo para "$2"?" 13 23 16)

	options=(1 "No"
	         2 "Si")

	choices=$("${cmd[@]}" "${options[@]}" 2>&1 >/dev/tty)

	for choice in $choices
	do
	    case $choice in
	        1)
	            ;;
	        2)
	           	curl http://127.0.0.1/proyecto/recursos/crear_modelo/$1/$2/$3
	           	sudo chmod 777 -R application/models
				echo    ""
				echo -e '\E[37;42m'"\033[5m| MODELO CREADO |\033[0m" 
				echo    ""
	            ;;
	        *) echo Selección invalida;;
	    esac
	done

fi

sleep 1.5
#!/bin/bash
cmd=(dialog --keep-tite --menu "Selecciones en que desea abrir los archivos:" 13 23 16)

options=(1 "IDE+Explorador"
         2 "IDE"
         3 "Explorador"
         4 "Ninguno")

choices=$("${cmd[@]}" "${options[@]}" 2>&1 >/dev/tty)


echo $DIALOG
for choice in $choices
do
    case $choice in
        1)
			google-chrome http://127.0.0.1/proyecto/$1/$2_$3
			echo    ""
			echo -e '\E[30;43m'"\033[5m| ABRIENDO ARCHIVOS EN IDE |\033[0m" 
			echo    ""
 			echo    ""
			echo -e '\E[30;43m'"\033[5m| ABRIENDO VISTA EN BROWSER |\033[0m" 
			echo    ""
			echo ""
			#chmod 777 -R assets
			sleep 2s
			subl application/views/$1/$2/$3.php && subl assets/css/$1/$2/$3.styl
            exit;;
        2)
			echo    ""
 			echo -e '\E[30;43m'"\033[5m| ABRIENDO ARCHIVOS EN IDE |\033[0m" 
			echo    ""
			echo ""
			#chmod 777 -R assets
			sleep 2s
			subl application/views/$1/$2/$3.php && subl assets/css/$1/$2/$3.styl
            exit;;
        3)
			google-chrome http://127.0.0.1/proyecto/$1/$2_$3
			echo    ""
			echo -e '\E[30;43m'"\033[5m| ABRIENDO VISTA EN BROWSER |\033[0m" 
			echo    ""
            exit;;
        4)
            exit;;
        *) echo Selección invalida;;
    esac
done
