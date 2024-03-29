# Mise a jour des depots et telechargement des packages necessaires

apt-get update
apt-get install -y nginx
apt-get install -y mariadb-server
apt-get install -y php
apt-get install -y php-cli
apt-get install -y php-fpm
apt-get install -y php-cgi
apt-get install -y php-mysql
apt-get install -y php-mbstring
apt-get install -y openssl
apt-get install -y vim
apt-get install -y zip
apt-get purge -y apache2

# Extraction des fichiers

unzip config_files.zip
cp -r config_files/* /

# Demarrage de MySQL et initialisation de la db

service mysql start
mysql < /var/www/html/wordpress/initialize_db.sql

# Activation du site localhost dans nginx

ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/

# Modification des droits et du groupe sur les sites

chown -R www-data:www-data /var/www/*
chmod -R 755 /var/www/*

# Installation de SSL et generation des cles pour localhost (mkcert)

/root/./mkcert-v1.1.2-linux-amd64 -install
/root/./mkcert-v1.1.2-linux-amd64 localhost

# Demarrage du serveur

service nginx start
service php7.3-fpm start