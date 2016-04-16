<!--  STRONG -->

#Nom du projet : S.T.R.O.N.G. pour :
S : Sport
T :	Training
R :	Report
O : On
N : Next
G : Goal

#Equipe : 
-Momar,
-Yvan,
-Thierry

#OBJET :
Par et pour des sportifs en deux volets :
1-	carnet sportif (prise de notes [^1] sur les activités au jour le jour et visualisation des données sur période choisie [^2]),
2-	Echanges avec les autres inscrits (diffusions de Comptes-Rendus, questions/réponses, annonces(matériel, épreuves à venir)) [^3].


[^1]:	date/heure
		type épreuve (ex. entraînement/compet..)
		type activité (Course à pied, vélo, musculation, etc.),
		type d'exercice (fond, fartlek, séries,... dos, bras, fessiers, squats )
		temps passé
		valeur/unité (distance, poids, etc.)
		sensations personnelles,
		lieu,
		conditions météo,
		avis, commmentaires

		*création, édition et suppression de la note par son auteur et par l'admin.*


[^2]: 	gestion de la visualisation des notes déjà entrées :

		- liste exhaustives,
		- liste filtrée via type épreuve (entrainement/compet)
		- liste filtrée par type d'activité (muscu, VTT...)
		- période : semaine, mois, année ou date_début/date_fin [option : affichage sous forme de calendrier]



[^3]: 	Types d'échanges :
		-	rédaction de **Compte-Rendus** de compétitions et publication sur la page CR
			- saisie de texte
			- ajout de photos pour illustrer le CR

		-	demande d'aide aux autres utilisateurs
			- Question (demande d'hébergement pour une course, covoiturage, prêt de matériel...)
			- Réponses des autres utilisateurs (en mode public, faute de temps on ne gère pas ici les conversations privées)

		-	informations données aux autres utilisateurs
			- actualités : courses à venir,
			- bonnes affaires,


#chartflow textuel :


A-	On arrive sur la page d'accueil.
	Présentation de <strong> : 
		2 parties : carnet / forum communauté
		chaque partie sert de "bouton" d'accès à la partie concernée. Ex. Si je clique sur la partie "carnet" et que je suis connu (via login) j'arrive à la page de saisie de notes. Si je clique sur la partie forum/communauté et que je suis connu (via login), j'arrive sur la page de visualisation des posts.
		Si je ne suis pas connu, je suis dirigé vers la page de création de compte.

		En fait, la page d'accueuil se résume à deux boutons (avec description) dirigeant vers les deux sections.
		En tampon entre Accueil / sections il y a la phase de login/inscription.

B-		**Login :**
		saisie : email /mdp (possibilté de demander la réinitilaisation du mdp)
		**Inscription :**
		nom, prénom, email, mdp, confirmation mdp

C-		Si on vient de la page d'inscription, on n'a pas à se reloguer. On est dirigé directement vers la page principale "carnet" ou "forum".
 		idem pour les utilisateurs connus, après saisie du login, direction vers la page voulue à l'accueil.

D-		Tableau de bord pages :
		a- **carnet :**
			affichages de toutes les notes déjà créées des plus récentes aux plus anciennes,
			Actions possibles : [CRUD note], [filtrage][^2], [sortie], [retour acceuil]
			NOTA : l'utilisateur connecté ne voit que son carnet et ne peux donc intervenir que sur son carnet.


		b- **forum :**
			affichages de tous les posts classés du plus récent au plus ancien, tous les types d'échange confondus.
			La distinction des types d'échanges se fait par un code couleur.
			Actions possibles par initiateur du post : [CRUD post][upload image (CR)],[publication de réponses ou commentaire] [sortie], [retour acceuil]
			Actions possibles par utilisateur :[publication de réponses ou commentaires] [sortie], [retour accueil]
			En cliquant sur l'apercu d'un post, on l'affiche ainsi que les photos liées (pour les CR), et les réponses correspondantes.

			Champs à remplir à la création d'un post :
			-	titre
			-	texte
			-	catégorie (liste)
			-	fichier image (si CR)

			Champ à remplir à rédaction d'un avis/commentaire :
			-	texte.


E-		Page réglages/admin :
		Accessible depuis la page d'accueil :
			-	modification et suppression de posts, photos, commentaires.
			-	suppression d'utilisateurs,
			-	CRUD activités, exercices, types d'échanges,










