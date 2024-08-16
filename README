![Image](https://raw.githubusercontent.com/vertingo/easy-admin-youtube-newsletter-firebase-symfony-app/master/web/assets/images/github/vertin_go_website.jpg)

### Apporter votre soutien au projet :heart: pour de futures évolutions!
[![GitHub stars](https://img.shields.io/github/stars/vertingo/multienv-stack-docker.svg?style=social&label=Star)](https://github.com/vertingo/multienv-stack-docker)
[![GitHub forks](https://img.shields.io/github/forks/vertingo/multienv-stack-docker.svg?style=social&label=Fork)](https://github.com/vertingo/multienv-stack-docker/fork)
[![GitHub watchers](https://img.shields.io/github/watchers/vertingo/multienv-stack-docker.svg?style=social&label=Watch)](https://github.com/vertingo/multienv-stack-docker)
[![GitHub followers](https://img.shields.io/github/followers/vertingo.svg?style=social&label=Follow)](https://github.com/vertingo)
[![Twitter Follow](https://img.shields.io/twitter/follow/vertin_go.svg?style=social)](https://twitter.com/vertin_go)
[![Facebook](https://img.shields.io/badge/Facebook-vertingo-blue?style=social&logo=facebook)](https://www.facebook.com/vertingo)
[![YouTube Subscribe](https://img.shields.io/youtube/channel/subscribers/UC2g_-ipVjit6ZlACPWG4JvA?style=social)](https://www.youtube.com/channel/UC2g_-ipVjit6ZlACPWG4JvA?sub_confirmation=1)

# 🌐 Projet Front-Back End MultiEnv Stack Docker
![App Progress Status](https://img.shields.io/badge/Status-Finished-0520b7.svg?style=plastic)
[![Download](https://img.shields.io/badge/Download-Repo-brightgreen)](https://github.com/vertingo/agence-voyage-symfony-app/archive/refs/heads/main.zip)

<!-- BEGIN LATEST DOWNLOAD BUTTON -->
[![Download zip](https://custom-icon-badges.demolab.com/badge/-Download-blue?style=for-the-badge&logo=download&logoColor=white "Download zip")](https://github.com/vertingo/agence-voyage-symfony-app/archive/1.0.2.zip)
<!-- END LATEST DOWNLOAD BUTTON -->

# Agence Voyage Symfony

Pour lancer l'application en local avec un environnement préconfiguré avec xampp
il suffit de faire:

```bash
composer install
```

Specifer l'url de la base de donnée dans l'environnement de dev en local dans le fichier .env.
Si xampp il faut lancer également le server Mysql sur le port 3306 et spécifier le mot de passe 
ou non dans  config/packages/doctrine.yaml selon la configuration utilisateurs dans PhpMyAdmin.

Ensuite une fois la connection établi avec la BD il faut récréer la table dans la bd grâce à 
doctrine en tapant les commandes suivantes:

```bash
php bin/console doctrine:database:create (Création de la bd projectsymfony)
php bin/console doctrine:schema:create (Création des tables)
```

Pour alimenter la base une fois la db créé dans PhpMyAdmin il faut éxécuter le script projectsymfony.sql 
présent dans le dossier données-sql une fois connecter à l'interface PhpMyAdmin dans xampp.

Il ne reste plus qu'à lancer le server de dev en local sur le port 8001:

```bash
php bin/console server:run (le server de dev devrait se lancer sur le port 8001 à l'adresse suivante localhost:8001)
```
