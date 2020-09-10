# Mise en place su projet : 

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

Le projet est un blog tres simple qui permet a un utilisateur non connecté de consulter des articles et de s inscrire
Et qui permet a un utilisateur connecté d ecrir des articles , et de les editer

Le blogue implémente symfony security et permet donc une connexion securisé avec un mot de passe encrypté

L application comporte uniquement deux entity article et utilisateur