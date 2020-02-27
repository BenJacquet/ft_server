1. **Que sont les containers et les machines virtuelles**
    * Machine virtuelle
        * Une machine virtuelle sert a recréer un **OS** dans un systeme hote.
        * Elle est completement isolee du systeme hote et fonctionne donc avec une quantité determinee en amont de ressources.
        * Il est possible d'installer un OS différent (Linux, Windows,...).
        * Etant donne qu'ils n'utilisent pas forcement toutes les ressource attribuees, les container
        representent une alternative plus flexible.
    * Container
        * Un container est un ou plusieurs **processus** isole du systeme, du coup il a l'avantage d'etre bien plus leger qu'une machine virtuelle
     * Comparaison visuelle

        ![Visual](https://user.oc-static.com/upload/2019/05/13/15577645779374_vm-vs-conteneur.png)

2. **Dockerfile**
    * A quoi sert ce fichier ?
        Un Dockerfile contient toutes les informations et instructions necessaires au build d'une image Docker.
    * Que contient il ?
    ```Dockerfile
        #Cette image aura pour image de base l'OS Debian, buster est la version 10 de debian
        FROM debian:buster

        #Recherche de mise a jour disponibles
        RUN apt-get update

        #Commande qui sera executee au lancement du container
        CMD ["echo", "Test, ce dockerfile est fonctionnel et la commande est executee"]
    ```

3. **Commandes**
    * **docker container run --publish 80:80 --detach --name webhost nginx**
        * Telecharge l'image **nginx** depuis Docker Hub
        * Demarre un container depuis cette image
        * **--publish** ouvre le port 80 sur l'adresse IP de l'hote
        * Redirige le traffic vers l'IP du container sur le port 80
        * **--detach** permet de detacher le container du terminal afin de pouvoir lancer d'autres commandes
        * **--name** permet de nommer le container (ici il porte le nom webhost)
        * **--link** permet de lier un container a un autre afin qu'ils puissent commmuniquer entre eux (ex. **--link wordpress:mysql**)
        * **-it** permet de lancer le container en mode interactif, on pourra y executer des commaandes comme en tty
    * **docker container ls -a**
        * Liste les containers en cours, stoppes, en pause
    * **docker container logs webhost**
        * Affiche le log du container en question (ici webhost)
    * **docker container top webhost**
        * Affiche la liste des processus en cours dans le container (ici webhost)
    * **docker container rm webhost**
        * Supprime le ou les containers en question (nom ou id du container)
        * L'option **-f** peut etre utilisee pour forcer la suppression d'un container actif
    * **docker images**
        * Affiche les images disponibles en local
    * **docker build _"CHEMIN DU REPERTOIRE CONTENANT LE DOCKERFILE"_**
        * Permet de creer une image en se servant du Dockerfile present dans le repertoire specifie (un point si il s'agit du repertoire courant)
        * **-t _"NOM DE L'IMAGE"_** permet de specifier un nom pour l'image creee

4. **Workflow**
    * Determiner l'image de base
    * Copier les fichier necessaires au fonctionnement des differents containers (nginx, wordpress.zip, wordpress.sql, sql)
    * Copier un script permettant de mettre en relation chaque container
        * INSTALLATION ET MISE A JOUR
            * installer wget, nginx, mariadb-server, php, php-cli, php-fpm, php-cgi, php-mysql, php-mbstring, oppenssl, zip
        * SETUP WORDPRESS
            * unzip l'archive contenant le site wordpress
        * SUPPRESSION D'APACHE2
            * **apt-get purge apache2** qui est inutile ici
        * SETUP SQL
            * Demarrer le service mysql
            * Donner "init.sql" en argument a mysql (qui contient l'instruction pour creer la database, donner les droits admin a l'utilisateur specifie, un flush et une mise a jour du compte)
            * Creer l'utilisateur avec les droits admin pour le wordpress (options -u pour l'utilisateur, -p pour le mot de passe) en envoyant la base de donnee en argument wordpress.sql
        * LIEN ENTRE LOCALHOST ET LES SITES ACTIFS
            * Creer un lien symbolique entre "/sites-avalable/localhost" et "/sites-enables/"
            * Modification du proprietaire de toute l'arborescence /var/www/* (chown -R)
            * Modification des droits pour toute l'arborescence de /var/www (rwx.r-x.r-x)
        * SETUP PHP
            * **/etc/init.d/php7.3-fpm start**
        * SETUP SSL
            * Creer dossier contenant mkcert
            * Telecharger mkcert avec wget depuis github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64
            * Editer les droits pour pouvoir executer mkcert
            * Installer mkcert **mkcert -install**
            * Lancement du ssl sur localhost **mkcert localhost**
        * DEMARRAGE DU SERVEUR
            * Demarrage du service nginx (**service nginx start**)
            * Lancer le script en question

* **Infos utiles**
    * [Docker Cheat Sheet](https://github.com/wsargent/docker-cheat-sheet#dockerfile)
    * [MySQL Cheat Sheet](https://www.mysqltutorial.org/mysql-cheat-sheet.aspx)
    * [Gestion des droits et proprietaires sur des fichiers](https://www.hostinger.fr/tutoriels/chmod-chown-linux/)
    * [Operateurs en Shell (ici la redirection)](https://unix.stackexchange.com/questions/159513/what-are-the-shells-control-and-redirection-operators)
    * [Guide pour la commande apt-get](https://doc.ubuntu-fr.org/apt-get)
    * [Utiliser SSL grace a mkcert](https://github.com/FiloSottile/mkcert)
    * [Utiliser wget](https://doc.ubuntu-fr.org/wget)
    * [Nginx cheat sheet](https://github.com/SimulatedGREG/nginx-cheatsheet)
