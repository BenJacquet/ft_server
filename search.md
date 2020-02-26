1. __**Que sont les containers et les machines virtuelles**__
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
* __**Commandes**__
    * __**docker container run --publish 80:80 --detach --name webhost nginx**__
        * Telecharge l'image __**nginx**__ depuis Docker Hub
        * Demarre un container depuis cette image
        * __**--publish**__ ouvre le port 80 sur l'adresse IP de l'hote
        * Redirige le traffic vers l'IP du container sur le port 80
        * __**--detach**__ permet de detacher le container du terminal afin de pouvoir lancer d'autres commandes
        * __**--name**__ permet de nommer le container (ici il porte le nom webhost)
    * __**docker container ls -a**__
        * Liste les containers en cours, stoppes, en pause
    * __**docker container logs webhost**__
        * Affiche le log du container en question (ici webhost)
    * __**docker container top webhost**__
        * Affiche la liste des processus en cours dans le container (ici webhost)
    * __**docker container rm webhost**__
        * Supprime le ou les containers en question (nom ou id du container)
        * L'option __**-f**__ peut etre utilisee pour forcer la suppression d'un container actif
    