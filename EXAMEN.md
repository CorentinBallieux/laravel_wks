# Examen — Finalisation du module Todos

## Contexte

Tu reçois un projet où le module **Todos** est partiellement implémenté. Certaines pages fonctionnent, d'autres affichent des données statiques codées en dur, et plusieurs actions essentielles ne sont pas opérationnelles. Le module **Candidatures** est, lui, complètement absent.

Ta mission principale est de compléter le module Todos pour qu'il fonctionne intégralement de bout en bout, et d'y ajouter un nouveau champ. Deux objectifs bonus sont proposés à celles et ceux qui terminent l'essentiel : la mise en service de la fonctionnalité de commentaires, et la réalisation complète du module Candidatures.

---

## État du projet remis

À la prise en main du projet, voici ce dont tu disposes et ce qui te manque.

### Ce qui est déjà en place

- La page **liste des todos** (`index`) affiche correctement les todos enregistrées en base ainsi qu'un compteur de tâches terminées.
- Depuis la liste, il est possible de **basculer le statut** d'une todo (terminée / à faire), de **supprimer** une todo, et d'accéder aux pages de détail, de création et d'édition via les liens correspondants.
- Le formulaire de **création** est fonctionnel : la todo créée apparaît bien dans la liste après soumission.
- La barre de navigation, le layout partagé et le design global sont en place.

### Ce qui ne fonctionne pas et doit être réparé

- La page de **détail** (`show`) affiche des informations **statiques codées en dur** dans la vue ; elle ne reflète pas la todo réellement consultée.
- Le **bouton de bascule du statut** présent sur la page de détail n'est pas opérationnel.
- Le **bouton de modification** présent sur la page de détail ne renvoie pas vers l'édition de la todo réellement consultée — il pointe systématiquement vers la même todo, indépendamment de celle affichée.
- La **suppression** d'une todo depuis la page de détail n'est pas opérationnelle.
- La page d'**édition** (`edit`) est **totalement statique** : les champs du formulaire ne sont pas pré-remplis avec les valeurs actuelles de la todo.
- La **méthode `update`** du contrôleur n'est pas définie : la soumission du formulaire d'édition n'a aucun effet sur la base de données.

---

## Mission principale

Tu dois mener à bien les six objectifs suivants. L'ordre est laissé à ta discrétion, mais leur réalisation est obligatoire.

### 1. Rendre la page de détail dynamique

La page de détail doit afficher les informations de la todo réellement consultée (celle dont l'identifiant figure dans l'URL), et non plus des données fixes.

### 2. Rendre la bascule de statut fonctionnelle depuis la page de détail

Le bouton de bascule présent sur la page de détail doit modifier l'état de la todo (terminée ↔ à faire) de la même manière que celui de la liste, et le changement doit être immédiatement visible.

### 3. Rendre la modification accessible depuis la page de détail

Le bouton de modification présent sur la page de détail doit mener vers le formulaire d'édition de la **todo réellement consultée**, et non vers une todo figée.

### 4. Rendre la suppression fonctionnelle depuis la page de détail

Le bouton de suppression présent sur la page de détail doit supprimer la todo concernée et ramener l'utilisateur vers la liste, où elle n'apparaît plus.

### 5. Rendre la page d'édition dynamique

Le formulaire d'édition doit être **pré-rempli** avec les valeurs actuelles de la todo (nom et autres champs), de sorte que l'utilisateur modifie un formulaire fidèle à l'état présent en base.

### 6. Implémenter la méthode `update`

La soumission du formulaire d'édition doit persister les modifications en base de données, puis rediriger l'utilisateur de manière cohérente (vers la liste ou vers la page de détail, selon ton choix).

### 7. Ajouter un champ `description` sur les todos

Voir la section dédiée ci-dessous.

---

## Nouveau champ : `description`

Tu dois introduire un nouveau champ **description** sur chaque todo. Il s'agit d'un texte libre, potentiellement multi-ligne, permettant à l'utilisateur de détailler la tâche à accomplir.

### Comportement attendu

- Le champ est **optionnel** : une todo sans description reste valide.
- Le champ doit être **persisté en base de données** et survivre aux rafraîchissements et redémarrages.

### Présence dans les vues

| Vue | Présence du champ |
|-----|-------------------|
| `index` (liste) | La description est affichée pour chaque todo, sous le nom (par exemple en sous-titre discret). Si la description est vide, rien ne s'affiche à cet endroit — pas de mention "aucune description". |
| `create` (formulaire de création) | Un champ de saisie multi-ligne (`textarea`) permet de renseigner la description. |
| `show` (détail) | La description est affichée intégralement, dans une zone clairement identifiée. Si la description est vide, la zone correspondante peut être absente ou afficher une indication discrète (à ton choix). |
| `edit` (formulaire d'édition) | Un champ de saisie multi-ligne, **pré-rempli** avec la description actuelle. |

### Cohérence

L'affichage de la description doit s'intégrer naturellement au design existant. Elle ne doit pas dénaturer la mise en page actuelle des trois pages concernées.

---

## Comportements transverses attendus

### Persistance

Toutes les modifications réalisées via l'interface (création, modification, suppression, bascule de statut) doivent **survivre à un rafraîchissement de page** et à un redémarrage de l'application.

### Cohérence

L'état d'une todo doit être le même partout dans l'application : si tu coches une todo depuis la liste, elle apparaît comme terminée sur sa page de détail ; si tu modifies son nom depuis le formulaire d'édition, le nouveau nom apparaît à la fois dans la liste et sur sa page de détail.

### Navigation

L'utilisateur doit pouvoir réaliser l'intégralité du parcours (créer, consulter, modifier, supprimer, basculer le statut) **uniquement via les liens et boutons de l'interface**, sans avoir besoin de taper une URL.

---

## Design

Le projet remis utilise déjà un design abouti (cartes blanches, palette grise, badges, états interactifs). Toute modification ou ajout que tu apportes doit **respecter ce langage visuel** : mêmes espacements, mêmes formes, même typographie.

Le champ `description` doit s'intégrer harmonieusement aux vues existantes — typiquement comme un sous-titre dans la liste, comme une zone de texte dans les formulaires, et comme un paragraphe distinct sur la page de détail.

Aucun changement de palette, de framework ou de structure globale n'est attendu sur le module Todos.

---

## Bonus 1 — Commentaires sur les todos

La page de détail des todos comporte une **section "Commentaires"** déjà esquissée visuellement, mais entièrement statique. Aucun commentaire n'est réellement enregistré, aucun n'est réellement supprimé.

Mettre cette fonctionnalité en service implique :

- L'introduction d'une nouvelle entité **Commentaire**, liée à la todo qu'il concerne.
- L'**ajout** d'un commentaire via le formulaire en bas de la page de détail : le commentaire apparaît immédiatement dans la liste après publication.
- La **suppression** individuelle d'un commentaire : il disparaît immédiatement de la liste.
- La **persistance** des commentaires en base de données.
- La **suppression en cascade** : supprimer une todo supprime également l'ensemble de ses commentaires.

Ce bonus est valorisé indépendamment du reste. Il n'est pas exigé que la mission principale soit intégralement terminée pour s'y atteler, mais il est recommandé de la finaliser en priorité.

---

## Bonus 2 — Module Candidatures

Le projet ne comporte aucun module **Candidatures**. Ce bonus consiste à le créer entièrement, sur le modèle du module Todos déjà en place.

### Périmètre attendu

- Une nouvelle entité **Candidature** avec les attributs suivants :
    - Entreprise (texte court)
    - Poste (texte court)
    - Statut, parmi exactement les valeurs : *Postulée*, *Entretien*, *Refusée*, *Acceptée*
    - Date de candidature
- Un parcours complet de gestion : liste, création, détail, édition, suppression.
- Un statut affiché sous forme de **badge coloré** (bleu, ambre, rouge, vert selon la valeur), visible dans la liste et dans le détail.
- Un lien **"Candidatures"** dans la barre de navigation partagée, permettant de basculer entre les deux modules.
- Un état vide géré sur la liste (message d'invitation quand aucune candidature n'existe).

### Cohérence

Le module Candidatures doit s'intégrer dans le même langage visuel que le module Todos. Tu peux conserver Tailwind (déjà en place) ou écrire ton propre CSS — aucun autre framework n'est autorisé.

Ce bonus est ambitieux et représente un travail conséquent. Il est valorisé à hauteur de son ampleur, mais ne constitue en aucun cas un préalable à la réussite de l'examen.

---

## Versionnement et remise

Le projet doit être **obligatoirement versionné avec Git**. À la remise, deux éléments sont attendus, sans alternative possible :

- **Un dépôt distant accessible à l'évaluateur** (GitHub, GitLab ou équivalent), permettant de consulter l'historique complet des commits.
- **Une archive ZIP du projet**, contenant l'intégralité du code source remis.

L'historique des commits doit refléter une progression cohérente du travail. Un dépôt réduit à un unique commit final ou sans historique exploitable est considéré comme non conforme.

L'examen est **réalisé individuellement**. Aucun travail collaboratif n'est attendu ni autorisé.

---

## Livrables

À la fin de l'examen, on doit pouvoir, depuis le projet que tu remets :

1. Lancer l'application sans procédure exotique.
2. Naviguer vers la liste des todos, en créer une nouvelle (avec ou sans description).
3. Cliquer sur une todo pour ouvrir sa page de détail, et y voir ses informations réelles (nom, description, statut).
4. Basculer le statut de la todo depuis la page de détail, et observer le changement immédiatement.
5. Ouvrir le formulaire d'édition, voir ses champs pré-remplis, modifier des valeurs et constater que les changements sont persistés dans la liste et le détail.
6. Supprimer une todo depuis sa page de détail, et constater qu'elle disparaît de la liste.
7. Effectuer un rafraîchissement de page et constater que toutes les données saisies subsistent.

Si tu as réalisé un ou plusieurs des bonus, le parcours utilisateur correspondant doit également être réalisable de bout en bout sans erreur.

---

## Hors-scope

Pour rester dans le périmètre attendu, tu **n'as pas besoin d'implémenter** :

- Système de comptes utilisateurs ou authentification.
- Filtrage, tri ou recherche sur la liste des todos.
- Pagination.
- Notifications visuelles (messages éclair, modales de confirmation).
- Export, statistiques, tableaux de bord.
- Internationalisation (l'application reste en français).
- Envoi d'emails ou de notifications.
- Gestion fine des cas d'erreur (formulaire vide, ressource inexistante) : ces situations ne sont pas testées dans l'évaluation.

Si tu termines en avance et souhaites approfondir un point particulier, signale-le avant — il pourra être valorisé à la marge.
