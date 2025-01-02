# Todo REST API

Une API REST pour gérer une liste de tâches. Cette API permet de récupérer, ajouter, modifier, et supprimer des tâches.

## Prérequis

1. **Installer XAMPP** :
   - Téléchargez et installez [XAMPP](https://www.apachefriends.org/index.html).
   - Assurez-vous qu'Apache et MySQL sont démarrés via le panneau de contrôle XAMPP.

2. **Cloner le projet** :
    ```bash
    git clone https://github.com/Veljko-Laces/todo-rest-api.git
    ```
3. **Mettre le dossier "todo-rest-api" dans "htdocs"** :
    - Dans le paneau de contrôle de XAMPP, vous retrouverez un bouton "Explorer", cliquez desssus.
    - Rentrez dans le dossier htdocs.
    - Mettez le projet `todo-rest-api` dans htdocs.

## Ressources
Todo REST API est livré avec un ensemble d'une ressource commune :

`/` 95 todos

## Routes
Les méthodes HTTP **GET, POST, PUT** et **DELETE** sont prises en charge. Vous pouvez utiliser http pour vos requêtes.

*GET* `/to-do-list-rest-api/`

*GET* `/to-do-list-rest-api/1`

*POST* `/to-do-list-rest-api/`

*PUT* `/to-do-list-rest-api/1`

*DELETE* `/to-do-list-rest-api/1`

## Tester mon API
- Téléchargez et installez [Bruno](https://www.usebruno.com/downloads).
- Cliquez sur `Open Collection`.
- Séléctionner le dossier `bruno todo rest api`.
- Vous pouvez maintenant tester toutes les requêtes de mon api 🤩.
