#Cette image aura pour OS Debian, buster est la version 10 de debian
FROM debian:buster

#Recherche de mise a jour et installation des packages necessaires aux differents services
RUN apt-get update ; apt-get install -y wget ; apt-get install -y nginx ; apt-get install -y mariadb-server ; apt-get install -y php ; apt-get install -y php-cli ; apt-get install -y php-fpm ; apt-get install -y php-cgi ; apt-get install -y php-mysql ; apt-get install -y php-mbstring ; apt-get install -y openssl ; apt-get install -y zip
