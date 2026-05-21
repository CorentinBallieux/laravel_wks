# Installation sur une nouvelle machine

Marche à suivre pour bootstrap le projet depuis zéro avec Docker (sans PHP/Composer installés sur l'hôte).

## Prérequis

- Docker installé et démarré
- Git
- Le repo cloné localement

## 1. Installer les dépendances Composer

`vendor/` n'existe pas encore, donc `./vendor/bin/sail` n'est pas disponible. On passe par l'image officielle `laravelsail/php83-composer` :

```bash
docker run --rm --network host -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" -w /var/www/html \
    -e COMPOSER_HOME=/tmp/composer \
    laravelsail/php83-composer:latest composer install --ignore-platform-reqs
```

Détails :

- À lancer depuis la racine du projet (là où se trouve `composer.json`).
- `--network host` est requis sur cette machine (le DNS du bridge Docker ne résout pas packagist).
- `-u "$(id -u):$(id -g)"` évite que `vendor/` soit créé en root.
- `--ignore-platform-reqs` permet d'installer sans PHP/extensions sur l'hôte.

## 2. Configurer l'environnement

```bash
cp .env.example .env
```

## 3. Démarrer la stack Sail

```bash
./vendor/bin/sail up -d
```

Ce qui démarre :

- Web sur `http://localhost`
- MySQL exposé sur `:3306`
- Vite sur `:5173`

## 4. Générer la clé d'application et migrer

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

## 5. (Optionnel) Dépendances front + Vite

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## Commandes utiles ensuite

- `./vendor/bin/sail down` — arrêter les containers (les données MySQL persistent dans le volume `sail-mysql`).
- `./vendor/bin/sail shell` — bash dans le container applicatif.
- `./vendor/bin/sail test` — lancer Pest.
- `./vendor/bin/sail artisan tinker` — REPL Laravel.
