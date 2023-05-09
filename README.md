# Développement d'une application Web de consultation et modification de morceaux de musique

## Auteur(s)
Coudrot Axel

## Installation / Configuration
Clonez le projet dans votre répertoire de travail.
Pour lancer le serveur local qui va vous permettre de tester les différentes fonctionnalités : 
```bash
php -d display_errors -S localhost:8000 -t public/
```
Puis vous pouvez y accéder avec le [LocalHost](http://localhost:8000)
Cependant nous avons ensuite développé un exécutable : bin/run-server.sh
permettant de lancer automatique le serveur local celui ci est exécuté par ma commande : 
```bash
composer start
```
##### Attention !
Cette commande n'est pas compatible avec windows.
Si vous êtes sous ce système d'exploitation, veuillez utiliser celle-ci : 
```cmd
composer start:windows
```
## Style de codage
Nous avons effectué ces étapes : 


1) Placez le fichier de configuration de PHP CS Fixer pour respecter la recommandation PSR-12 (télécharger) à la racine du projet  
#### Remarque importante
Le fichier à télécharger doit s'appeler « .php-cs-fixer.php », même si votre navigateur a décidé de supprimer le « . » initial. Renommez le fichier si nécessaire.
2) Excluez le fichier « .php-cs-fixer.cache » de l'index git en complétant le fichier « .gitignore »
3) Lancez une première vérification manuelle avec la commande :
```
    php vendor/bin/php-cs-fixer fix --dry-run
```
4) Constatez que le fichier « src/Database/Mypdo.php » n'est pas valide  
#### Information
L'option « --dry-run » (test à blanc) demande une exécution normale, mais aucun fichier n'est modifié.
5) Lancez une nouvelle vérification manuelle avec la commande :
```
    php vendor/bin/php-cs-fixer fix --dry-run --diff
```
6) Constatez en quoi consisterait la correction du fichier « src/Database/Mypdo.php »
#### Information
L'option « --diff » affiche les différences entre l'original et ce qui est ou serait corrigé.
7) Lancez une dernière vérification manuelle avec la commande :
```
    php vendor/bin/php-cs-fixer fix
```
8) Ouvrez le fichier « src/Database/Mypdo.php » et constatez sa correction

Nous avons aussi mis à votre disposition des scripts de composer pour verifier et corriger vos scripts php : 
```bash
composer test:cs
```
```bash
composer fix:cs
```

## Configuration de la base de donnée
Avec le fichier .mypdo.ini, la connection et la configuration
à la base de donnée sera automatique pour tous les fichiers php.