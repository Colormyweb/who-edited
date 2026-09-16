# WhoEdited

Petit plugin WordPress qui ajoute une colonne triable « Dernière modif. » aux écrans d'administration Pages et Articles.

## Ce que ça fait

- Ajoute une colonne « Dernière modif. » dans les écrans Pages/Articles (wp-admin), juste avant la colonne Date, triable comme les colonnes natives.
- Affiche la date et l'heure de la dernière modification, et le nom de la personne qui l'a faite (en gras/italique).
- Pastille de couleur : rose si modifié il y a moins de 30 jours (seuil configurable via la constante `WHOEDITED_RECENT_DAYS`), gris sinon.
- Aucun réglage, aucune dépendance : on active, la colonne apparaît.

## Installation

Ce plugin remplace « CMW Colonne Dernière Modification » (renommé WhoEdited). Si l'ancienne version est installée sur un site : désactiver puis supprimer l'ancienne extension avant d'installer WhoEdited (le changement de nom change aussi le dossier du plugin, ce n'est donc pas une mise à jour en place).

1. `Extensions > Ajouter une extension > Téléverser une extension`.
2. Sélectionner `who-edited.zip`, cliquer sur « Installer maintenant ».
3. Activer l'extension.
4. La colonne « Dernière modif. » apparaît sur les écrans Pages et Articles.

## Compatibilité

- Compatible Polylang (sites multilingues).
- Requiert WordPress 5.8 minimum, testé jusqu'à 6.6.
- Version courante : 1.5.

## Licence

GPL-2.0-or-later — voir [LICENSE](LICENSE)
