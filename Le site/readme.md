# Explications de la structure du projet #

## Bref descriptif ##
- ### Controller ###
	Le controller va être l'endroit pour écrire votre code php et ainsi 'controler' une vue. Il va être le lien entre les vues et les modèles.
- ### Model ###
	Le model va être l'endroit pour gérer des données, en récupérant des tables de base de données et en créant des classes d'objet.
- ### View ###
	La view va être l'endroit pour insérer l'html et tout ce qui va être affiché sur la page web en général. 
- ### index.php ###
	index.php est le fichier appelé lorsqu'on ouvre la page web. C'est à partir de celui-ci que nous allons gérer les variables globales, la structure de la page (header - contenu - footer), le chargement des classes (models), etc... Pour afficher le contenu de la page, il va appeler un controleur qui va lui-même appeler une vue.

## Comment ajouter votre page au projet ##
### 0. N'ayez pas peur ###
  Les instructions qui suivent vont peut-être vous effrayer mais il n'y a pas de quoi ! À la première lecture vous n'allez peut-être pas tout suivre mais ce sera plus facile avec le code devant les yeux parce que j'ai mis des commentaires dans **index.html**, **HomeController.php** et dans **header.php**
### 1. *votrePage*.php ###
  Dans le dossier Views vous retrouverez la page où rentrer l'html (ex : map.php pour la carte, home.php pour l'accueil, event.php ... , ...) Considérez que vous êtes dans la balise body. En effet, le head et la déclaration du body se fait dans le fichier header.php et la fermeture du document html ainsi que la fermeture de la balise body se fait dans le footer.php
### 2. *votrePage*Controller.php ###
  C'est bien beau de créer sa page mais encore faut-il y avoir accès. Pour cela, vous allez devoir écrire une classe php controller. Dans celle-ci, vous devrez créer 2 fonctions : __construct() et run(). construct va permettre de créer un objet controller et run va être la fonction appelée dans index.php permettant d'exécuter votre code et d'afficher la vue avec votre html.
### 3. header.php ###
  Maintenant que le controller est créé, vous devez créer un lien dans le header pour pouvoir accéder à ce controller et par conséquent, à votre contenu. Je vous laisse regarder dans le fichier, je crois que c'est assez explicite ;)
### 4. index.php ###
  Tout est en place, nous pouvons maintenant lier notre controller à l'index.php en récupérant la variable action dans l'url. Rassurez-vous, une fonction le fait déjà pour vous ! Par contre, vous devrez créer un nouveau 'case' dans le 2ème switch-case avec le nom passé dans votre lien.

## Ce qu'il faut savoir sur le php ##
### Déclaration ###
  Dans TOUS les fichiers php vous devrez mettre les balises `<?php *votre code* ?>` si vous voulez écrire en php. Le serveur ne lira pas votre code si il ne se trouve pas entre ces balises.
### Syntaxe ###
  La syntaxe est fort différente de Javascript ou autres langages, il va falloir vous faire une idée :p  
    
  Exemples :
   - var maVariable => $maVariable
   - maVariable.maFonction() => $maVariable->maFonction()
   - *string1* + *string2* => *string1* . *string2*
   
## Installer Linux Apache MySQL PHP (LAMP)
### Installation ###
Dans le terminal, entrez : 
1. `sudo apt-get update`
2. `sudo apt-get install apache2 php mysql-server libapache2-mod-php php-mysql`  
Voilà, LAMP est installé ! Tester : [localhost](http://localhost/)  
### Création d'un répertoire de travail ###
1. `sudo mkdir /home/user/Documents/www-dev/public /home/user/Documents/www-dev/private`
2. Copier le contenu du fichier 000-default dans `sudo gedit /etc/apache2/sites-available/000-default.conf` 
3. `sudo ln -s /home/user/Documents/www-dev/public /var/www/html/public`
4. `sudo ln -s /home/user/Documents/www-dev/private /var/www/html/private`
5. `sudo rm /var/www/html/index.html`
6. `sudo chown -R $USER:user /home/user/Documents/www-dev`
7. `sudo /etc/init.d/apache2 force-reload`

## Blog

Worpress? 
1. http://rivanos.esy.es
2. http://rivanos.esy.es/wp-login.php?redirect_to=http%3A%2F%2Frivanos.esy.es%2Fwp-admin%2F&reauth=1
3. https://cpanel.hostinger.fr/


