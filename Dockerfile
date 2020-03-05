# Cette image aura pour OS Debian, buster est la version 10 de debian
FROM    debian:buster

# Copie des fichier des configuration et du script de lancement

COPY    /srcs/config_files.zip /
COPY    /srcs/launch_server.sh /

# Execution du script qui unzip et deplace les fichiers ou il faut
#RUN     bash /config_files/launch_server.sh