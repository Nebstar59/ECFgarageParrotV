
# Garage V. Parrot - Application Web Vitrine

![Garage V. Parrot](https://garageparrot.sectorzone.net)

Bienvenue dans la documentation du projet Garage V. Parrot, une application web vitrine pour un garage automobile. Ce projet vise à mettre en avant la qualité des services proposés par le Garage V. Parrot et à permettre aux visiteurs de consulter les différents services et voitures d'occasion disponibles à la vente.

## Table des matières

* [Introduction](#introduction)
* [Spécifications Techniques](#spécifications-techniques)
* [Installation en local](#installation-en-local)
* [Création d'un administrateur](#création-dun-administrateur)
* [Base de données](#base-de-données)
* [Documentation Technique](#documentation-technique)
* [Charte Graphique](#charte-graphique)

## Introduction

Vincent Parrot, un professionnel de la réparation automobile, a ouvert son garage à Toulouse en 2021. Il souhaite désormais être visible sur internet et nous a demandé de créer un site web vitrine pour son garage. Il souhaite que les visiteurs puissent consulter les différents services proposés par son garage, ainsi que les voitures d'occasion disponibles à la vente. Il souhaite également pouvoir gérer les informations du site (services, voitures d'occasion, etc.) via une interface d'administration.

## Spécifications Techniques

L'application web a été développée en utilisant les technologies suivantes:

- Front-end:
  - HTML Twig
  - SCSS
  - Bootstrap
  - JavaScript

- Back-end:
  - PHP 8.1 
  - Symfony 6.3
  - MySQL (MariaDB en production, MySQLWorkbench en local)

- Dépendances:
  - Composer
  - Webpack Encore
  - vich/uploader-bundle
  - easy-corp/easyadmin-bundle

## Installation en local

Pour exécuter l'application localement, suivez ces étapes:

1. Cloner le dépôt GitHub:
   
   git clone https://github.com/Nebstar59/ECFgarageParrotV.git
   

2. Accéder au répertoire du projet:
   
   cd ECFgarageParrotV
   

3. Installer les dépendances PHP via Composer:
   
   composer install
   

4. Configurer la base de données en renseignant les informations de connexion dans le fichier `.env`:

   
   DATABASE_URL=mysql://votre_utilisateur:votre_mot_de_passe@localhost:3306/votre_base_de_donnees
   

5. Effectuer les migrations pour créer la base de données:
   
   php bin/console doctrine:migrations:migrate
   

6. Lancer le serveur local:
   
   php bin/console server:run
   

7. Accéder à l'application via votre navigateur à l'adresse http://localhost:8000.

## Création d'un administrateur

Un compte administrateur est nécessaire pour gérer les informations du site. Pour créer un administrateur, suivez ces étapes:

1. Connectez-vous à l'application en tant que super admin (role créer pour Vincent Parrot) à l'aide des identifiants fournis dans le fichier "spécifications techniques.pdf".
   

## Base de données

Les fichiers de création et d'alimentation de la base de données se trouvent dans le dossier migrations du projet.



## Documentation Technique

Veuillez consulter le fichier "documentation_technique.pdf" pour accéder à la documentation technique détaillée, notamment les spécifications techniques, les diagrammes.

## Charte Graphique

La charte graphique du projet est disponible dans le fichier `charte_graphique.pdf`. Vous y trouverez la palette de couleurs, la sélection de polices d'écriture.




