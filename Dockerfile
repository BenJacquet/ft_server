# Cette image aura pour OS Debian, buster est la version 10 de debian
FROM    debian:buster

# Copie des fichier des configuration et du script de lancement
RUN     mkdir config_files
COPY    /srcs/wordpress /var/www/
COPY    /srcs/wordpress_db.sql /var/www/
COPY    /srcs/wordpress_db.sql /var/www/
COPY    /srcs/launch_server.sh /config_files/
COPY    /srcs/initialize_db.sql /var/www/
COPY    /srcs/mkcert-v1.1.2-linux-amd64 /config_files/
COPY    /srcs/localhost /etc/nginx/sites-available/

# Execution du script qui unzip et deplace les fichiers ou il faut
CMD     bash /config_files/launch_server.sh