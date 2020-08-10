# Cette image aura pour OS Debian, buster est la version 10 de debian
FROM    debian:buster

# Copie des fichier des configuration et du script de lancement
COPY    /srcs/config_files.zip /
COPY    /srcs/scripts /

# Execution du script qui unzip et deplace les fichiers ou il faut
ENTRYPOINT    bash launch_server.sh && bash