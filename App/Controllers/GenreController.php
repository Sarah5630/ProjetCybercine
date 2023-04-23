<?php

namespace Projet\Controllers;

use Projet\Models\Genre;

class GenreController
{
    // Adds a new genre to the database.
    public function add()
    {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['category'])) {
                $category = htmlspecialchars($_POST['category']);

                $genre = new Genre();
                $result = $genre->addGenre($category);

                if ($result) {
                    // Redirect the user 
                    header('Location: indexAdmin.php?action=addGenre');
                } else {
                    // Display an error message
                    echo "An error occurred.";
                }
            }
        }
        // Display the add genre form
        require('./App/Views/Admin/AddGenre.php');
    }

    // Deletes an existing genre from the database.
    public function delete($idGenre)
    {
        if (!empty($idGenre)) {
            $genre = new Genre();
            $result = $genre->delete($idGenre);

            if ($result) {
                // Redirect the user 
                header('Location: indexAdmin.php?action=addGenre');
                exit();
            } else {
                // Display an error message
                echo "Une erreur s'est produite";
            }
        }
    }

}
