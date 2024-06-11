# Poulette des pirates
Type de défi : consolidation, SOLO
Dépôt:hackers-poulette
Durée:2 days
ATTENTION : Ce projet utilisera PHP. Et nous n'avons pas parlé de page GitHub. Il y a peut-être une raison.

## Objectifs des missions
A la fin de ce défi vous devriez avoir amélioré votre :

HTML sémantique
accessibilité en HTML
Toupet
Framework CSS ou pas (bootstrap, bulma, tailwind,.............. )
Amélioration progressive
Programmation PHP
Planification du projet
Création de maquette
Vous devriez également être capable de :

erreurs d'affichage
## La mission
La société Hackers Poulette™ vend des kits d'accessoires Raspberry Pi pour construire le vôtre. Ils souhaitent permettre à leurs utilisateurs de contacter leur équipe d'assistance. Votre mission est de créer un formulaire de « contact support » en ligne entièrement fonctionnel, en PHP . Il doit afficher un formulaire de contact et traiter la réponse reçue (désinfecter, valider, répondre à l'utilisateur).

Logo des pirates informatiques

Le formulaire doit être composé de :

prénom et nom
genre
adresse e-mail
pays
sujet (3 possibilités)
message
REMARQUE : Tous les champs, à l'exception du sujet , doivent être remplis. Le champ subject prend la valeur par défaut Other .

## Instructions
Doit avoir:

le référentiel du projet doit inclure une maquette basse fidélité
le code html du formulaire doit être sémantiquement valide
le HTML doit être accessible aux personnes aveugles 
en cas de mauvaise saisie, le formulaire doit afficher un indice visuel utile sur l'erreur
afficher le message d'erreur à côté du champ de saisie correct
le message d'erreur doit être lisible (utile pour les utilisateurs)
le formulaire doit être désinfecté et validé (côté serveur)
si toutes les entrées requises sont valides, le script doit répondre par email à une adresse donnée
mettre en œuvre une technique anti-spam honeypot .
Facultatif:

validation côté client avec JavaScript
travailler sur une expérience utilisateur (UX) bonne et claire
répondre à la demande de l'utilisateur avec Ajax
### Partie 0 : planifier le travail à venir
Étudiez tous les aspects du projet, du frontend au backend, puis réalisez une maquette et enfin commencez à coder.

### Partie 1 : formulaire de contact (html)
Commencez par créer le HTML du formulaire, n'oubliez pas l' enrichissement progressif et l'accessibilité aux stores

### Partie 2 : formulaire de contact (css, via framework css)
Utilisez bootstrap , bulma , Materialise , ... pour obtenir rapidement votre visuel, tout en respectant la charte graphique ci-dessous.

police : https://www.fontsquirrel.com/fonts/bellota
couleurs : #0d8187, #FFF, #303030

### Partie 3 : formulaire de contact (PHP)
Pour vous aider lors du développement, affichez les données brutes reçues du formulaire à l'aide de la fonction PHP print_r . 

### Partie 4 : traiter les données du formulaire
Enfin, assainissez la saisie puis validez le contenu (champ obligatoire, email valide, etc...), en terminant par un email envoyé et un retour pour l'utilisateur.