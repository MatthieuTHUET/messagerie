** Framework Mysqli basic MVC **
- le controleur principal est : "www/index.php"
- toutes les url sont de la forme : index.php?m=<controleur>&a=<action>
- les controleurs secondaires sont dans "application/controleur/<controleur>"
- les requetes SQL sont dans le dossier "application/table" rangées dans des fichiers <table>.php

|-- application : les fichiers propres à l'application web
   |-- _config : 
      |-- config.php : fichier de configuration inclus dans le controleur principal (index.php)
   |-- _gabarit : fichiers utilisés pour les gabarits (modèles de pages)
      |-- gabarit.php : gabarit par défaut
      |-- inc_entete.php : entête de page (bandeau supérieur)
      |-- inc_fonction.php : fonctions utiles
      |-- inc_head.php : entête HTML (charge les fichiers css et js)
      |-- inc_menu.php : barre de navigation principale
      |-- inc_nav_generated.php : menu CRUD généré, inclus dans "inc_menu.php"
      |-- inc_pied.php : pied de page   
   |-- controleur : dossier contenant les contrôleurs secondaires
      |-- _default : controleur par défaut, page d'acceuil
      |-- _generateur : le générateur du CRUD des tables de la BDD
      |-- <controleur> : dossier d'un controleur. Pour un controleur de type CRUD, le nom du controleur correspond à une table et les fichiers sont :
         |-- ctr_<table>.php : Controleur secondaire contient les fonctions "action" (préfixées par "a_").
         |-- <table>_edit.php : Vue pour le formulaire d'édition/création
         |-- <table>_liste.php : Vue pour la liste des enregistrements
   |-- table : 
      |-- <table>.php : pour chaque table, requêtes SQL du CRUD
|-- document : cahier des charge, documentation, script sql...etc
|-- vendor : dossier des librairies externes
|-- www : racine du site web
   |-- _css : fichiers css   
   |-- _images : fichiers images
   |-- _js : fichiers javascript
   |-- index.php : controleur principal
|-- composer.json : gestion des librairies utilisées. Pour installer les librairies : "composer install"
|-- composer.lock : gestion des librairies
|-- readme.txt : ce document




