# Développement d'une application Web de consultation et modification de morceaux de musique

## Auteur(s)
Coudrot Axel

## Installation / Configuration
Clonez le projet dans votre répertoire de travail.
Pour lancer le serveur local qui va vous permettre de tester les différentes fonctionnalités : 
```
php -d display_errors -S localhost:8000 -t public/
```
Puis vous pouvez y accéder avec le [LocalHost](http://localhost:8000)
Cependant nous avons ensuite développé un exécutable : bin/run-server.sh
permettant de lancer automatique le serveur local
## Style de codage
Nous avons effectué ces étapes : 


    Placez le fichier de configuration de PHP CS Fixer pour respecter la recommandation PSR-12 (télécharger) à la racine du projet
    Remarque importante

    Le fichier à télécharger doit s'appeler « .php-cs-fixer.php », même si votre navigateur a décidé de supprimer le « . » initial. Renommez le fichier si nécessaire.
    Excluez le fichier « .php-cs-fixer.cache » de l'index git en complétant le fichier « .gitignore »
    Lancez une première vérification manuelle avec la commande :

    php vendor/bin/php-cs-fixer fix --dry-run

    Constatez que le fichier « src/Database/Mypdo.php » n'est pas valide
    Information

    L'option « --dry-run » (test à blanc) demande une exécution normale, mais aucun fichier n'est modifié.
    Lancez une nouvelle vérification manuelle avec la commande :

    php vendor/bin/php-cs-fixer fix --dry-run --diff

    Constatez en quoi consisterait la correction du fichier « src/Database/Mypdo.php »
    Information

    L'option « --diff » affiche les différences entre l'original et ce qui est ou serait corrigé.
    Lancez une dernière vérification manuelle avec la commande :

    php vendor/bin/php-cs-fixer fix

    Ouvrez le fichier « src/Database/Mypdo.php » et constatez sa correction
    Documentez votre projet dans « README.md » en listant les précédentes commandes dans une partie « Style de codage »

