<?php

// Connexion et lien à la base de donnée
include '../connexionDb/database.php'; 
include '../php/index.php';
global $db;

// Fonction pour ajouter un bookmark

function add_bookmark($url, $title, $description, $categorie_id, $db) {
    $add = "INSERT INTO bookmarks (`url`, `title`, `description`, `categorie_id`) 
    VALUES ('$url', '$title', '$description', '$categorie_id')";
    if ($db->query($add) === TRUE) {
        $message = "Bookmark ajouté avec succès";
    } else {
        $message = "Erreur: " . $add . "<br>" . $db->error;
    }
    return $message;
};

//Fonction pour modifier un bookmark

function update_bookmark($id, $title, $url, $description, $category_id, $db) {
    $updateSql = "UPDATE bookmarks SET title='$title', url='$url', description='$description', category_id='$category_id' WHERE id=$id";
    if ($db->query($updateSql) === TRUE) {
        $message = "Bookmark modifié avec succès";
    } else {
        $message = "Erreur: " . $updateSql . "<br>" . $db->error;
    }
    return $message;
}

//Fonction pour modifier un bookmark

function delete_bookmark($id, $db) {
    $deleteSql = "DELETE FROM bookmarks WHERE id=$id";
    if ($db->query($deleteSql) === TRUE) {
        $message = "Bookmark supprimé avec succès";
    } else {
        $message = "Error: " . $deleteSql . "<br>" . $db->error;
    }
    return $message;
}