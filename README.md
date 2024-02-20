

# Biblotheque_en_ligne
Il s'agit d'un test de recrutement qui consiste à réaliser une application de gestion de bibliothèque en ligne
# Pré réquis
Version php : 7.4.19
Version laravel :8
Serveur local :laragon
Base de donné : mysql intégré à laragon.
On peut aussi utiliser Xamp et son phpmyadmin intégré.
# Instruction
1-Créer la base de donné dans mysql (phpmyadmin)
Nom :bibliotheque
Username :root
Mot de passe : 
2-importez le fichier sql :bibliotheque.sql dans la base de donné avec pou but de créer les tables.
3-Télécharger le projet zip en accédant à ce lien https://github.com/Zakiyou/Biblotheque_en_ligne.git
4-Décompresser le zip et placer le dossier(projet) dans le dossier www se situant dans le dossier d’installation de laragon
3-Lancer le serveur local et accéder l’application via votre navigateur au lien suivant http://localhost/bibliotheque_en_ligne/public/home
# Test
  # Utilisateur 
Se connecter avec les identifiants suivant si vous ne voulez pas créer encore un autre compte pour certaines tâches
 Email : lionnel@gmail.com
Mot de passe :lionnelmessi
1-	La page d’accueil affiche la liste des livres déjà ajoutés par l’administrateur en ligne ;on peut filtrer les livres par catégorie, par auteur  ou  par année. Pour filtrer, il suffit d’entrer la chaine dans l’un des  champs de filtre concerné et vous cliquez sur le bouton «Cliquer ici pour filtrer par catégorie,auteur,année»
2-	Il y a la possibilité de voir les commentaires et notes en cliquant sur « commentaire et note » 
Vous êtes rédirigés vers la page affichant les commentaires et note associé au livre et vous avez la possibilité de commenter également en donnant votre note (1/5) :
Nb :Vous devrez être conneccté,sinon vous êtes redirigés vers la page de connexion.Si vous n’avez pas encore un compte,Cliquez sur « je n’ai pas un compte » pour vous inscrire.Ensuite connectez vous après la création de compte.
3-	Possibilité également d’ajouter un livre à sa liste de lecture en clique sur « Emprunter ».
Nb :Vous devrez être conneccté,sinon vous êtes redirigés vers la page de connexion.Si vous n’avez pas encore un compte,Cliquez sur « je n’ai pas un compte » pour vous inscrire.Ensuite connectez vous après la création de compte.
4-	Une fois connecter ,on peut voir la liste de notre lecture en cliquant sur « Mes emprunts ».
5-	Une fois qu’on a la liste de notre lecture ,on peut lire un de nos livre en ligne en cliquant sur « Lire ».
# Administrateur
Se connecter avec les identifiants suivants :
Email : zakiyoubababodi@gmail.com
Mot de passe :bababodizakiyou
1-Gestion des utilisateur :cliquer sur « Utilisateur »
- cliquer sur « Nouveau utilisateur » pour ajouter un utilisateur administrateur;
-Consulter la liste de tout les utilisateurs
-Effectuer des recherches d’utilisateur par email ou par nom ;
-Supprimer un utilisateur (une boite de dialogue s’affichera pour demander confirmation de suppression) ;
2-Gestion des livres :cliquer sur « Livre »
-Ajouter un livre en cliquant sur « Nouveau livre »
-Consulter la liste des livres ;
-Rechercher un livre en fonction de n’importe quel filtre dans le champs de recherche .Entrez juste la chaîne à rechercher et le tout est joué . tout est dynamique et automatique ;
-Cliquer sur l’icone voir pour visualiser le livre ;
-Modifier une des informations du livre en cliquant sur l’cone « edit » ;
-Supprimer un livre en cliquant sur l’icône « delete » ;
3-Gestion emprunt :cliquer sur « Emprunt »
-Consulter tout les emprunts éffectués :ici aussi la recherche est dynamyque peut importe le filtre sur lequel on veut éffectuer la recherche ;
Exemple :entre une catégorie et vous aurez les livres de cette catégorie emprunté,entrez un nom et vous aurez les livres emprunté par le nom entré ;
-Supprimer un emprunt éffectué en cliquant sur l’icone « delete » ;
4-Statistique
-Consulter quelques statistiques  sur le système de gestion des livre







