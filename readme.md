- [mini-blog](#mini-blog)
  - [Installation](#installation)
    - [Linux](#linux)
    - [Windows](#windows)
    - [MAC OS](#mac-os)
  - [Placer le projet](#placer-le-projet)
  - [Créer un VirtualHost](#créer-un-virtualhost)
    - [Linux :](#linux-)
    - [Windows](#windows-1)
  - [Inclure la base de donnée](#inclure-la-base-de-donnée)

# mini-blog 
Trois répertoires : 
- Code 
- Rapport 
- BDD

## Installation 
### Linux 
Installer LAMP : http://doc.ubuntu-fr.org/lamp 
### Windows 
Installer WampServer : https://alcatiz.developpez.com/tutoriel/installer-wamp-windows10/ 
### MAC OS 
Installer Mamp : https://apprendre-php.com/tutoriels/tutoriel-24-installation-et-prise-en-main-de-mamp.html 

## Placer le projet
Placer le contenu du répertoire Code dans : 
`/var/www/html` : Pour Linux
`\wamp64\www\` : Pour Windows 
`/htdocs` : Pour MAC OS 

## Créer un VirtualHost 
### Linux : 
http://elisabeth.pointal.org/doc/code/server/lamp/creer_des_virtualhosts
### Windows 
Allez sur votre navigateur et tapez : `localhost`
Cliquez sur `Ajouter un Virtual Host` dans `outil`
Entrez le chemin du projet. 

## Inclure la base de donnée 
Ouvrez phpMyAdmin allez dans importer et placez y le contenu du répertoire `BDD`





  
  
