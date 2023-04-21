<?php

namespace Projet\Controllers;

use Projet\Models\Comment;
use Projet\Models\Rating;

class CommentController
{
    // Adds a new comment and rating to the database.
    public function add()
    {
        // Check if the pseudo session exists and if the form data is set
        if (isset($_SESSION['pseudo']) && isset($_POST['comment']) && isset($_POST['idMovie'])) {
            $dateAdded = date('Y-m-d'); // Use standard date format for database
            $commentText = htmlspecialchars($_POST['comment']);
            $approved = 0;
            $idMovie = htmlspecialchars($_POST['idMovie']);
            // Create a new instance of the Comment class
            $comment = new Comment();
            // Add the comment to the database
            $comment->add($dateAdded, $commentText, $approved, $idMovie, $_SESSION['pseudo']);
            // Add the rating to the database if provided
            if (isset($_POST['rating'])) {
                $rating = new Rating();
                $rating->add($dateAdded, htmlspecialchars($_POST['rating']), $idMovie, $_SESSION['pseudo']);
            }
            // Redirect the user to the page "all movies"
            header('Location: index.php?action=allMovies');
            exit();
        } else {
            // Redirect to the login page 
            header('Location: index.php?action=login&message=Les commentaires sont réservés au membres. Veuillez vous inscrire ou vous connecter');
            exit();
        }
    }

}
