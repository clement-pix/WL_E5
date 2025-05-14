# Déploiement

## 1. Installation du projet Laravel

### 1. Cloner le dépôt

Si le projet est sur GitHub, clonez-le dans le répertoire :
```sh
  cd /var/www/clement/     
  git clone https://github.com/clement-pix/WL_E5.git
```

Si le projet est déjà sur votre machine, accédez simplement au dossier du projet :
```sh
  cd /WL_E5
```

### 2. Installer les dépendances Laravel

```sh
  composer install
```

Vérifier que les dépendances sont bien installées.

### 3. Installer les dépendances Node.js

```sh
  npm install
```

Vérifier que les dépendances sont bien installées.

```sh
  composer -v
```

```sh
  npm -v
```

## 2. Configuration de l'environnement

Allez dans WL_E5 :
```sh 
cd /var/www/clement/WL_E5
```

### 1. Copier le fichier `.env`

```sh
  cp .env.example .env
```

### 2. Générer la clé d'application Laravel

```sh
  php artisan key:generate
```

Vérifier dans le fichier `.env` si la clé est bien générée.

```sh 
grep "APP_KEY=" < .env
```

Vérifier s'il y a bien la clé générée comme ça :
```sh
APP_KEY=base64:401JXbGLVA1rwx+m2eQsteUP2bUfLbk7LrLQMJfOHog=
```

### 3. Configurer la base de données

Dans le fichier `.env`, configurez votre base de données mariadb :

Ouvrez votre fichier `.env`, utilisez :

```ini
  DB_CONNECTION=mariadb
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nom_base_de_donnee
  DB_USERNAME=nom
  DB_PASSWORD=motdepasse
  DB_TABLE_PREFIX=WL_
  DB_COLLATION=utf8mb4_unicode_ci
```

N'oubliez pas de retirer les # devant chaque ligne pour que cela soit activé.

### 4. Ajouter la structure des données dans phpMyAdmin

Vous disposez d’un fichier `structure_WL.sql`, qui se situe dans `WL_E5/database/structure_WL.sql` importez-le dans phpMyAdmin :

Si vous souhaitez importer les données :

Les données sont disponible sur : https://falbala.futaie.org:8443/~mussetc/donnee_WL_.sql

Vérifiez si la base et les données sont bien importées

## 5. Compilation des assets

Ce projet utilise **Vite** pour la gestion des assets CSS/JS. Pour compiler les assets :

Pour une version optimisée en production :
```sh
  npm run build
```

Pour une version en développement :
```sh
  npm run dev
```

## 6. Débogage

- Vider le cache si nécessaire :
```sh
  php artisan optimize:clear
  php artisan route:clear
  php artisan cache:clear
  php artisan config:clear
```

## 7. Lien vers storage/images

```sh
php artisan storage:link
```
Les images sont disponible sur : https://falbala.futaie.org:8443/~mussetc/images/

Ajouter les images dans votre fichier WL_E5/storage/app/public/images

**Votre projet est maintenant prêt à être utilisé !**
