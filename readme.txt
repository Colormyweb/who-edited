=== WhoEdited ===
Contributors: colormyweb
Tags: admin, colonne, révision, édition, contenu
Requires at least: 5.8
Tested up to: 6.6
Stable tag: 1.5
License: GPLv2 or later

Ajoute une colonne "Dernière modif." triable sur les écrans Pages et Articles :
date/heure de la dernière modification, nom de la personne qui l'a faite, et une
pastille pour repérer en un coup d'œil les contenus modifiés récemment
(rose = modifié il y a moins de 30 jours, gris = pas de modification récente).
Le seuil se change dans la constante WHOEDITED_RECENT_DAYS en haut du fichier
du plugin.

Aucun réglage, aucune dépendance : on active, la colonne apparaît.

== Installation ==

Ce plugin remplace "CMW Colonne Dernière Modification" (renommé WhoEdited).
Si l'ancienne version est installée : Extensions > Extensions installées >
désactiver puis supprimer "CMW Colonne Dernière Modification" avant d'installer
WhoEdited (le changement de nom change aussi le dossier du plugin, ce n'est donc
pas une mise à jour en place).

1. Extensions > Ajouter une extension > Téléverser une extension.
2. Sélectionner who-edited.zip, cliquer sur "Installer maintenant".
3. Activer l'extension.
4. La colonne "Dernière modif." apparaît sur les écrans Pages et Articles, juste
   avant la colonne Date. Cliquer sur son en-tête pour trier par date de modification.

== Changelog ==

= 1.5 =
* Seuil "récent" passé de 7 à 30 jours (plus raisonnable à l'usage).
* Pastille légèrement réduite (9px au lieu de 11px).

= 1.4 =
* Renommage du plugin : "CMW Colonne Dernière Modification" devient "WhoEdited".
* Préfixes de fonctions et text domain alignés sur le nouveau nom (whoedited_ / who-edited).

= 1.3 =
* Simplification à 2 couleurs (rose = changement récent, gris = rien à signaler) au lieu de 3, pour plus de lisibilité.
* Pastille agrandie avec un fin contour pour rester visible même en gris.
* Seuil "récent" (7 jours par défaut) configurable via une constante dédiée.

= 1.2 =
* Nom de la dernière personne à avoir modifié le contenu affiché en gras et italique pour une meilleure lisibilité.

= 1.1 =
* Ajout de l'internationalisation (i18n).
* Gestion du cas où l'auteur de la dernière modification a été supprimé ("Inconnu").

= 1.0 =
* Version initiale.
