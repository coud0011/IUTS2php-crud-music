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
```bash
composer start:windows
```
Je vous conseille tout de même d'utiliser [gitBash](https://gitforwindows.org/) 
pour récupérer plus facilement le projet et exécuter les commandes de ce ReadMe 
une fois cela fait.
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


## Configuration de la base de donnée
Avec le fichier .mypdo.ini, la connection et la configuration
à la base de donnée sera automatique pour tous les fichiers php.

## Tests
Afin de tester la validité des scripts php que l'on écrit dans ce projet,
nous avons mis à votre disposition des commandes de test.
Celles-ci sont regroupées sous une commande : 
```bash
composer test
```
Ce script est composé de deux autres : 
```
composer test:cs
```
Puis
```
composer test:codecept
```
Le premier script permet de vérifier 
le style de codage et la syntaxe simple,
Le deuxième permet de tester la bonne exécution et 
la conformité des scripts php avec les autres scripts 
et la base de donnée.
#### Dans le cas d'une erreur de style de codage
Nous vous proposons pour cela une commande pour 
corriger automatiquement vos fichiers : 
```bash
composer fix:cs
```
#### Pour toutes autres erreurs relevées durant les tests
Malheureusement, la magie n'existe pas, il vous faudra revoir 
vous-même vos codes. Vous avez quand même des indications 
pouvant vous aider dans les relevés de tests.