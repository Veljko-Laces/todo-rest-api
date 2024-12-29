<?php
require 'manager.php';

function initDatabase() {
    $create_db = "CREATE DATABASE IF NOT EXISTS todos_db";
    makeSqlRequest($create_db, false, false);

    $create_table_todos = "CREATE TABLE IF NOT EXISTS todos (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `todo` VARCHAR(100) NOT NULL,
        `done` BOOLEAN NOT NULL DEFAULT FALSE
    );";
    makeSqlRequest($create_table_todos, true, false);

    seedDatabase();
}

function seedDatabase() {
    $count_query = "SELECT COUNT(*) FROM todos;";
    $result = makeSqlRequest($count_query, true, true);

    $tasks = [
        "Acheter du pain",
        "Faire du sport",
        "Lire un livre",
        "Appeler un ami",
        "Planifier les vacances",
        "Laver la voiture",
        "Préparer le dîner",
        "Faire la lessive",
        "Nettoyer la maison",
        "Regarder un film",
        "Écrire un article",
        "Répondre aux emails",
        "Planifier la semaine",
        "Faire une promenade",
        "Apprendre une nouvelle compétence",
        "Faire du jardinage",
        "Aller au marché",
        "Faire les courses",
        "Organiser le bureau",
        "Trier les papiers",
        "Repasser les vêtements",
        "Faire du yoga",
        "Boire un café avec un ami",
        "Prendre un rendez-vous médical",
        "Faire une méditation",
        "Ranger le garage",
        "Planifier une soirée",
        "Acheter un cadeau",
        "Réparer quelque chose à la maison",
        "Mettre à jour le CV",
        "Chercher des opportunités d emploi",
        "Apprendre une langue",
        "Préparer une présentation",
        "Réparer une étagère",
        "Aller à la bibliothèque",
        "Faire du vélo",
        "Passer du temps en famille",
        "Jouer à un jeu de société",
        "Nettoyer le réfrigérateur",
        "Écrire un poème",
        "Faire une playlist",
        "Créer une recette",
        "Prendre des photos",
        "Visiter un musée",
        "Regarder un documentaire",
        "Économiser de l'argent",
        "Faire un puzzle",
        "Dessiner ou peindre",
        "Écouter un podcast",
        "Faire une séance de musculation",
        "Organiser un pique-nique",
        "Réparer une lampe",
        "Téléphoner à ses parents",
        "Classer les photos",
        "Aller courir",
        "Essayer une nouvelle recette",
        "Aller chez le coiffeur",
        "Créer un budget",
        "Réorganiser la chambre",
        "Prendre soin de ses plantes",
        "Aller à la pharmacie",
        "Installer une nouvelle application",
        "Écrire une lettre",
        "Réserver un restaurant",
        "Apprendre un morceau de musique",
        "Faire une sieste",
        "Jouer d'un instrument",
        "Mettre à jour le téléphone",
        "Organiser une soirée jeux",
        "Tester un nouveau café",
        "Aller au parc",
        "Faire une liste de courses",
        "Regarder un tutoriel",
        "Visiter un lieu touristique",
        "Réparer une fuite d'eau",
        "Mettre à jour les logiciels",
        "Faire un tiramisu",
        "Nettoyer les vitres",
        "Donner des vêtements",
        "Aller chez le dentiste",
        "Faire des crêpes",
        "Définir ses objectifs",
        "Méditer en pleine conscience",
        "Faire une vidéo",
        "Prendre un bain relaxant",
        "Jouer à un jeu vidéo",
        "Aider un voisin",
        "Trier la bibliothèque",
        "Faire une promenade en forêt",
        "Découvrir une nouvelle série",
        "Prendre des nouvelles d'un collègue",
        "Faire une séance d'étirements",
        "Changer les draps",
        "Tester une nouvelle activité",
        "Créer un blog",
        "Démarrer un journal",
        "Mettre à jour ses mots de passe",
        "Acheter une plante",
        "Réparer un objet cassé",
        "Mettre à jour ses profils en ligne"
    ];

    if ($result[0]["COUNT(*)"] === 0) {
        foreach($tasks as $task) {
            addTodoManager($task);
        }
    }
}

function initApp() {
    initDatabase();
    seedDatabase();
}

?>
