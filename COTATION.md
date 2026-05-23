# Grille de cotation — Examen Finalisation Module Todos

L'examen est noté sur **50 points** au titre de la mission principale. Deux objectifs bonus permettent d'obtenir jusqu'à **10 points supplémentaires**, autorisant un total maximum de **60 / 50**.

Un étudiant qui réalise intégralement la mission principale obtient 50/50 ; les bonus permettent de dépasser ce plafond.

Chaque critère peut être attribué intégralement, partiellement, ou à zéro selon le niveau d'atteinte effectivement constaté à la lecture du code et à l'exécution de l'application.

---

## Mission principale — 50 pts

### 1. Page de détail dynamique — 6 pts

| Critère | Pts |
|---------|----:|
| La vue `show` reçoit la todo correspondant à l'identifiant présent dans l'URL (méthode contrôleur adaptée, paramètre passé à la vue) | **2,5** |
| Tous les champs affichés (nom, statut, description) reflètent les données réelles de la todo consultée, et non plus des valeurs codées en dur | **2,5** |
| Les identifiants utilisés dans les actions intégrées à la page (boutons, formulaires) correspondent bien à la todo affichée | **1** |

### 2. Bascule du statut fonctionnelle depuis le détail — 4 pts

| Critère | Pts |
|---------|----:|
| Le bouton de bascule envoie la requête vers la bonne route et la bonne todo | **2,5** |
| Le statut affiché sur la page de détail reflète le nouveau statut après la bascule | **1,5** |

### 3. Lien de modification fonctionnel depuis le détail — 2,5 pts

| Critère | Pts |
|---------|----:|
| Le lien "Modifier" mène vers l'édition de la todo réellement consultée, et non plus vers une todo figée | **2,5** |

### 4. Suppression fonctionnelle depuis le détail — 4 pts

| Critère | Pts |
|---------|----:|
| Le formulaire de suppression cible bien la todo consultée et invoque la bonne route | **2,5** |
| Après suppression, l'utilisateur est redirigé vers la liste où la todo n'apparaît plus | **1,5** |

### 5. Page d'édition dynamique — 5 pts

| Critère | Pts |
|---------|----:|
| La vue `edit` reçoit la todo correspondant à l'identifiant de l'URL | **1** |
| Les champs du formulaire (nom, description, et tout autre champ) sont **pré-remplis** avec les valeurs actuelles de la todo | **3** |
| Le formulaire pointe vers la route `update` correcte, avec l'identifiant de la todo réellement consultée | **1** |

### 6. Méthode `update` — 7,5 pts

| Critère | Pts |
|---------|----:|
| La méthode `update` du contrôleur existe et accepte les données envoyées par le formulaire | **1** |
| Les modifications sont effectivement **persistées en base** | **4** |
| Une redirection cohérente est effectuée après la mise à jour (vers la liste ou la page de détail) | **1,5** |
| Les modifications sont reflétées sur toutes les pages où la todo apparaît (liste, détail) | **1** |

### 7. Nouveau champ `description` — 14 pts

| Critère | Pts |
|---------|----:|
| **Migration et modèle** — colonne `description` ajoutée à la table `todos` (type `text` ou équivalent, nullable), modèle mis à jour (`$fillable`) | **2,5** |
| **Création** — un champ `textarea` est présent dans le formulaire de création, et la description saisie est persistée en base | **2,5** |
| **Édition** — un champ `textarea` est présent dans le formulaire d'édition, **pré-rempli** avec la valeur actuelle, et la modification est persistée | **2,5** |
| **Affichage sur la page de détail** — la description est visible dans une zone clairement identifiée | **2,5** |
| **Affichage sur la liste** — la description s'affiche pour chaque todo, sous forme de sous-titre discret ; rien ne s'affiche si la description est vide | **2,5** |
| **Intégration visuelle harmonieuse** — le nouveau champ s'intègre dans le langage visuel existant (typographie, espacements, hiérarchie) sans dénaturer la mise en page | **1,5** |

### 8. Cohérence et qualité d'ensemble — 7 pts

| Critère | Pts |
|---------|----:|
| **Persistance** — toutes les données (todos, descriptions, statuts) survivent à un rafraîchissement de page et à un redémarrage de l'application | **2,5** |
| **Cohérence inter-pages** — l'état d'une todo (nom, statut, description) est identique partout dans l'application | **2,5** |
| **Navigation 100 % par l'interface** — l'intégralité du parcours (créer, consulter, modifier, supprimer, basculer) est réalisable sans taper d'URL | **1** |
| **Lancement reproductible** — l'application se lance sans procédure exotique, les migrations s'exécutent sans erreur, et un parcours utilisateur complet se déroule sans bug visible | **1** |

---

## Bonus 1 — Commentaires fonctionnels (jusqu'à 4 pts)

| Critère | Pts |
|---------|----:|
| Entité `Commentaire` (migration avec clé étrangère vers `todos`, modèle avec relations `belongsTo` / `hasMany`) | **1** |
| **Ajout** d'un commentaire via le formulaire en bas de la page de détail, persisté et immédiatement visible | **1** |
| **Suppression** individuelle d'un commentaire, persistée et immédiatement reflétée à l'écran | **1** |
| **Suppression en cascade** — supprimer une todo supprime aussi l'intégralité de ses commentaires (aucun commentaire orphelin en base) | **1** |

---

## Bonus 2 — Module Candidatures (jusqu'à 6 pts)

| Critère | Pts |
|---------|----:|
| Migration, modèle et routes nommées pour les candidatures (les 7 actions du CRUD) | **1,5** |
| **CRUD complet et fonctionnel** — création, affichage liste, affichage détail, édition, suppression, avec persistance | **2,5** |
| **Badges colorés** pour les 4 statuts (bleu / ambre / rouge / vert), visibles dans la liste et dans le détail | **1** |
| **Lien "Candidatures"** ajouté à la barre de navigation partagée, et **état vide géré** sur la liste (message d'invitation quand aucune candidature n'existe) | **1** |

---

## Récapitulatif

| Section                                                | Points     |
|--------------------------------------------------------|-----------:|
| **Mission principale**                                 | **50**     |
| 1. Page de détail dynamique                            | 6          |
| 2. Bascule du statut depuis le détail                  | 4          |
| 3. Lien de modification depuis le détail               | 2,5        |
| 4. Suppression depuis le détail                        | 4          |
| 5. Page d'édition dynamique                            | 5          |
| 6. Méthode `update`                                    | 7,5        |
| 7. Nouveau champ `description`                         | 14         |
| 8. Cohérence et qualité d'ensemble                     | 7          |
| **Bonus 1 — Commentaires fonctionnels**                | **+4 max** |
| **Bonus 2 — Module Candidatures**                      | **+6 max** |
| **Total maximum**                                      | **60 / 50**|

---

## Règles d'attribution

- **Intégral** : le critère est rempli sans réserve, observable à l'écran ET dans le code.
- **Partiel** : le critère est partiellement rempli (par exemple : la persistance fonctionne mais sans redirection cohérente, la description s'affiche en détail mais pas en liste) — ajuster le score proportionnellement.
- **Zéro** : le critère est absent ou non fonctionnel.

**Pénalités transverses :**

- **Absence de versionnement Git ou historique non conforme** (commit unique final, dépôt inaccessible) : la note finale est plafonnée à 50 % du total obtenu.
- **Absence d'une des deux remises obligatoires** (dépôt distant accessible ou archive ZIP) : retrait de 5 points sur la note finale.
- **Travail manifestement collaboratif** (l'examen est individuel) : note à 0 pour les étudiants concernés.

**Bonus :**

- Les bonus ne sont pris en compte qu'une fois la mission principale réalisée à un niveau acceptable (au moins la moitié des points de la mission principale obtenus). Un bonus parfaitement réalisé sur une mission principale en grande partie inaboutie est valorisé à la marge uniquement.
