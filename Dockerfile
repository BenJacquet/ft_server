#Cette image aura pour OS Debian, buster est la version 10 de debian
FROM debian:buster

#Recherche de mise a jour disponibles
RUN apt-get update

#Commande qui sera executee au lancement du container
CMD ["echo", "Test, ce dockerfile est fonctionnel et la commande s'est execute"]