# Déploiement du projet Symfony via FileZilla

Ce guide vous accompagne pas à pas pour déployer une application Symfony sur un hébergeur mutualisé en utilisant **FileZilla** pour le transfert des fichiers et **phpMyAdmin** pour l’import de la base de données.

---

## Prérequis

- Symfony 7 installé localement
- Application prête à être déployée (tests OK en local)
- Accès FTP (identifiants + host)
- Accès à **phpMyAdmin** (ou équivalent)
- Base de données créée sur le serveur distant

---

## Structure du projet

Assurez-vous d’avoir la structure suivante :

```
projet/
├── bin/                  # Commandes Symfony (dont console)
├── config/               # Configuration de l’application
├── migrations/           # Migrations Doctrine (si utilisées)
├── public/               # Racine web (index.php, assets, .htaccess)
├── src/                  # Code source PHP (contrôleurs, services, etc.)
├── templates/            # Fichiers Twig (vues)
├── tests/                # Tests unitaires (souvent exclus du déploiement)
├── translations/         # Fichiers de traduction (YAML, XLIFF, etc.)
├── var/                  # Cache, logs (à exclure du transfert FTP)
├── vendor/               # Dépendances (Composer)
├── .env                  # Variables d’environnement (ne pas envoyer)
├── .gitignore            # (à exclure)
├── composer.json         # Dépendances PHP
├── composer.lock         # Verrouillage des versions
├── dump.sql              # Export de la base de données
└── README.md             # Ce fichier !

````

---

## Étape 1 – Configuration du fichier `.env`

Modifier `.env` pour la prod :

```env
APP_ENV=prod
APP_DEBUG=0
APP_SECRET=changeme

DATABASE_URL="mysql://utilisateur:motdepasse@serveur:3306/nom_base"
```

⚠️ Ne jamais committer `.env.local` !

---

## Étape 2 – Préparation du projet

Avant de transférer les fichiers :

Identifier les fichiers inutiles (tests, README, .git, etc.)

---

## Étape 3 – Transfert FTP avec FileZilla

1. Ouvrir FileZilla
2. Se connecter avec vos identifiants FTP
3. Naviguer vers le dossier du projet
4. Envoyer tous les dossiers

---

## Étape 4 – Configuration Apache (avec symfony/apache-pack)

Symfony propose une configuration Apache optimisée via le Symfony Apache Pack, un package qui fournit automatiquement un fichier .htaccess sécurisé dans le dossier public/.

### Installation (à faire en local avant déploiement)

Si ce n’est pas encore fait dans votre projet, installez le pack avec Composer :

```bash
composer require symfony/apache-pack
```

Cela va générer un fichier .htaccess dans le dossier public/ avec une configuration adaptée à Symfony, notamment :

- Redirection automatique des URL vers index.php
- Suppression des extensions .php
- Protection des fichiers sensibles
- Gestion fine du cache navigateur

### Vérification du fichier .htaccess généré
Voici un extrait typique du fichier .htaccess généré par symfony/apache-pack :

```apacheconf
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>

<IfModule !mod_rewrite.c>
    ErrorDocument 404 /index.php
</IfModule>
```

Ce fichier doit être placé dans le dossier public/, qui est la seule racine web exposée. Tous les autres dossiers (src/, config/, vendor/, etc.) doivent rester inaccessibles depuis le navigateur.

### Configuration du dossier racine
📍 IMPORTANT :
Dans le panneau de configuration de votre hébergeur, vous devez indiquer que le dossier racine du site est /public, et non la racine du projet.

Exemple :
- Dossier FTP racine du site : symfony-project/
- Dossier exposé : symfony-project/public/

Si ce réglage n’est pas possible sur l’hébergement mutualisé, vous devez déplacer manuellement le contenu de public/ à la racine et adapter index.php pour qu’il retrouve les chemins vers le reste du projet (ce n’est pas recommandé, mais parfois nécessaire).

## Étape 5 – Import de la base via phpMyAdmin

1. Connectez-vous à **phpMyAdmin**
2. Créez une nouvelle base si besoin
3. Allez dans l’onglet **Importer**
4. Sélectionnez le fichier `dump.sql`
5. Lancez l’import

---

## Étape 6 – Vérifications après déploiement

* Le site s’affiche sans erreur
* La base est bien connectée
* Les routes fonctionnent (`symfony console debug:router`)
* Pas de messages d’erreur dans les logs
* Les fichiers sont bien protégés (voir sécurité ci-dessous)

---

## Sécurité et bonnes pratiques

* Empêchez l’accès aux fichiers sensibles :
  * `.env*`, `/vendor`, `/config`, `/src`, etc.
* Pour cela, vérifiez la configuration Apache et `.htaccess`
* Supprimez ou déplacez les fichiers inutiles du serveur (dump SQL, etc.)
* Ne laissez pas de comptes FTP inactifs

---

## Ressources utiles

* Documentation Symfony déploiement : [https://symfony.com/doc/current/deployment.html](https://symfony.com/doc/current/deployment.html)
* Guide FileZilla : [https://filezilla-project.org](https://filezilla-project.org)
* Configuration Apache : [https://httpd.apache.org/docs/](https://httpd.apache.org/docs/)

---

## 🛟 Support

En cas de souci :

* Vérifiez les erreurs dans `/var/log/` si accessible
* Activez `APP_DEBUG=1` temporairement pour obtenir plus d’infos
* Contactez l’assistance de votre hébergeur avec le lien de l’erreur et votre `index.php`

---