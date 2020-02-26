1. Que sont les containers et les machines virtuelles
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
2. Commandes
    * **docker container run --publish 80:80 --detach --name webhost nginx**
        1. Telecharge l'image __nginx__ depuis Docker Hub
        2. Demarre un container depuis cette image
        3. **--publish** ouvre le port 80 sur l'adresse IP de l'hote
        4. Redirige le traffic vers l'IP du container sur le port 80
        5. **--detach** permet de detacher le container du terminal afin de pouvoir lancer d'autres commandes
        6. **--name** permet de nommer le container (ici il porte le nom webhost)
    * **docker container ls -a**
        1. Liste les containers en cours, stoppes, en pause
    * **docker container logs webhost**
        1. Affiche le log du container en question (ici webhost)
    * **docker container top webhost**
        1. Affiche la liste des processus en cours dans le container (ici webhost)
    * **docker container rm webhost**
        1. Supprime le ou les containers en question (nom ou id du container)
        2. L'option **-f** peut etre utilisee pour forcer la suppression d'un container actif
    