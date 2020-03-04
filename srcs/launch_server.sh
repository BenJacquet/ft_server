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
apt-get purge -y apache2

# Demarrage de MySQL

service mysql start
mysql < /var/www/initialize_db.sql
mysql wordpress -u root --password= < /var/www/wordpress_db.sql

# Activation du site localhost dans nginx

ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/

# Modification des droits et du groupe sur le site

chown -R www-data:www-data /var/www/*
chmod -R 755 /var/www/*

# Lancement de PHP
/etc/init.d/php-fpm7.3 start

# Installation de SSL sur localhost (mkcert)

/config_files/./mkcert-v1.1.2-linux-amd64 -install
/config_files/./mkcert-v1.1.2-linux-amd64 localhost

# Demarrage de Nginx

service nginx start