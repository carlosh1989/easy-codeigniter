#!/bin/bash

# -*- ENCODING: UTF-8 -*-
sudo apt-get update
echo    ""
echo -e '\E[37;42m'"\033[5m| Repositorios Actualizados |\033[0m" 
echo    ""
sudo apt-get install toilet
echo    ""
echo -e '\E[37;42m'"\033[5m| Toilet instalado |\033[0m" 
echo    ""
sudo apt-get install gnome-terminal
echo    ""
echo -e '\E[37;42m'"\033[5m| Gnome-terminal instalado |\033[0m" 
echo    ""
sudo apt-get install dialog
echo    ""
echo -e '\E[37;42m'"\033[5m| Dialog instalado|\033[0m" 
echo    ""
sudo apt-get install python-software-properties
sudo add-apt-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install nodejs
echo    ""
echo -e '\E[37;42m'"\033[5m| Node instalado |\033[0m" 
echo    ""
sudo apt-get update && sudo apt-get install php5-curl
echo    ""
echo -e '\E[37;42m'"\033[5m| Curl instalado |\033[0m" 
echo    ""
sudo curl https://npmjs.org/install.sh | sudo sh
echo    ""
echo -e '\E[37;42m'"\033[5m| Dialog instalado |\033[0m" 
echo    ""
sudo npm –g install stylus
echo    ""
echo -e '\E[37;42m'"\033[5m| Stylus instalado |\033[0m" 
echo    ""
sudo apt-get install lamp-server^
sudo a2enmod rewrite
sudo service apache2 restart
sudo apt-get install mysql-server php5-mysql php5 php5-memcache
sudo ln -s /home/hugo/www /var/www
echo    ""
echo -e '\E[37;42m'"\033[5m| lamp-server instalado y carperta enlazada a /home/www |\033[0m" 
echo    ""
sudo  apt-get  install  phpmyadmin
sudo ln -s /usr/share/phpmyadmin /var/www
echo    ""
echo -e '\E[37;42m'"\033[5m| PhpMyAdmin instalado y enlazado a /home/www |\033[0m" 
echo    ""

google-chrome http://localhost/$1
cd ..
subl $1

