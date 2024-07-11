# blog_php

Ce script PHP gère la création et la sauvegarde de posts dans un système de blog simple. Il vérifie l'authentification de l'utilisateur, valide le contenu du post, et enregistre les données dans des fichiers JSON.
## Fonctionnalités principales
- Vérification du contenu
- Vérifie si le champ 'contenue' du formulaire POST n'est pas vide.
- Authentification
- Vérifie si le champ 'secret' du formulaire POST est rempli.
- Compare le secret fourni avec celui stocké dans le fichier 'utilisateur.json'.
- Création et sauvegarde du post
- Crée un tableau avec le contenu du post, la date actuelle, et une URL unique.
- Sauvegarde ces données dans un nouveau fichier JSON nommé avec le timestamp actuel.
- Mise à jour de la liste des posts
- Ajoute l'URL du nouveau post au fichier 'posts.json'.
- Gestion des erreurs
- Affiche des messages d'erreur appropriés en cas de problème.
