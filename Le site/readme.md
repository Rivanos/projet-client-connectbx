# Explications de la structure MVC du projet #

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
### 1. votrePage.php ###
	
