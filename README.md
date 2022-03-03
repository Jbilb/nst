# Informations relatives du projet

Fiche projet : 

Codes du projet
--------------------------

1. Code hébergeur (OVH / IONOS)
 
* notre hébergeur OVH

2. Code hébergement / FTP / Serveur
 
* hôte : ftp.cluster031.hosting.ovh.net
* port : 
* id : doncamh-mk
* mot de passe : 999TtuY5N5zYe

3. Code BDD
 
* adresse serveur : doncamhadmin.mysql.db
* nom de la base : doncamhadmin
* id : doncamhadmin
* mot de passe : B4z4A6NiVu2b


Installation 
--------------------------

1. REPOSITORY
   
* $ cd repository
   
2. NPM

* $ npm install

3. GULPFILE

Replace "var localhostPath" with your repository name


Serve project
-----------------

Generate server, watch files, compile sass and live reload

* $ gulp serve


Build project
-------------

Minify images, css and js files.. And all of other files in prod/ 

* $ gulp build
