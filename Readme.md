Evaluation Symfony réalisé par Rodrigue JURIENS et Jordan BEAUX

# Mise en place du projet : 

apres avoir cloner 

```cmd
composer install
```
ensuite créer un fichier .env.local en copiant le .env existant
Puis changer la ligne : 
```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```
avec vos informations

Puis executez 

```cmd
php bin/console doctrine:migration:migrate
```

enfin lancer le serveur 

```cmd
symfony serve
```

## Description du projet

Le projet est un blog très simple qui permet à un utilisateur non connecté de consulter des articles et de s'inscrire.
Il permet à un utilisateur connecté d'ecrire des articles, de les consulter et de les editer

Le blogue implémente symfony security et permet donc une connexion securisée avec un mot de passe encrypté

L'application comporte uniquement deux entity article et utilisateur

### Details du projet 

L'appli s'appuie sur 2 entity, déclinées en 2 controllers principalement (pour gérer les 2 entity) et 2 form (liés aux entity).
La route du "home" (le "/" basique) nous amène sur l'index qui affiche le nom de l'utilisateur (page d'accueil). L'autre route principale est "/articles" qui va lister tous les articles et ensuite les routes (à partir de "/articles") "/new","{id}","/edit/{id}" et "{id}" mais avec la method= DELETE pour respectivement ajouter un article, aller sur l'article avec l'id désigné, éditer l'article désigné et supprimer l'article désigné.

L'UserController, qui sert à créer un user dans l'appli (en gros l'inscription au site) fonctionne exactement de la même manière avec simplement un encodage du password avec l'algorithme d'encryptage définit dans le security.yaml

Le SecurityController s'occupe des login/logout (avec les routes "/login" et "/logout")

Pour faciliter les inscriptions et les post des articles, nous utilisons le créateur de form de Symfony 
```cmd
php bin/console make:form
``` 
que l'on structure à notre guise avec les champs de nos entity
