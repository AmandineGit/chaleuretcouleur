# Chaleur et Couleur

Site du projet Chaleur et Couleur.

## Configuration après clonage

Ce dépôt fournit un hook git versionné (`.githooks/pre-commit`) qui optimise
automatiquement les images ajoutées à `images/galerie/` avant chaque commit
(génération de vignettes et de versions d'affichage en WebP — voir
`scripts/optimize-galerie.sh`). Pour l'activer sur une nouvelle machine :

```bash
git config core.hooksPath .githooks
```

À relancer sur chaque nouvelle machine de développement, car ce réglage
n'est pas versionné (il vit dans la config git locale de chaque clone).

## Galerie

Les images de `images/galerie/<catégorie>/<œuvre>/` sont automatiquement
déclinées en deux versions optimisées, générées à côté de chaque original
(jamais modifié ni supprimé) :

- `<nom>.thumb.webp` — 500px de large max, qualité ~75, utilisée dans la
  grille de la galerie
- `<nom>.display.webp` — 1600px de large max, qualité ~82, utilisée dans la
  modale plein format

Avec le hook activé, il suffit de déposer une image dans `images/galerie/`
puis de commit/push comme d'habitude : les dérivés sont générés et ajoutés
au commit automatiquement.

Pour régénérer les dérivés manquants sur l'ensemble de la galerie (par
exemple après un premier clone, ou si le hook n'était pas encore actif au
moment de l'ajout de certaines photos) :

```bash
scripts/optimize-galerie.sh
```

Le script ne retraite pas les dérivés déjà à jour, il peut donc être relancé
sans risque après l'ajout de nouvelles photos.
