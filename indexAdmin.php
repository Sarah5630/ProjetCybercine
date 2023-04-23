<?php

// --------------------------Session start------------------------

session_start();


use \Projet\Controllers\MovieController;
use \Projet\Controllers\GenreController;
use \Projet\Controllers\UserController;

//---------------------------Composer autoload--------------------

require_once __DIR__ . "/vendor/autoload.php";
if (file_exists(__DIR__ . "/.env")) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

try {
    $MovieController = new MovieController();
    $GenreController = new GenreController();
    $UserController = new UserController();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {

            case 'userConnect':
                $userController->userConnect();

            case 'addMovie':
                $MovieController->add();
                break;

            case 'deleteMovie':
                if (isset($_POST['idMovie'])) {
                    $idMovie = $_POST['idMovie'];
                    $MovieController->delete($idMovie);
                }
                break;

            case 'addGenre':
                $GenreController->add();
                break;

            case 'deleteGenre':
                if (isset($_POST['idGenre'])) {
                    $idGenre = $_POST['idGenre'];
                    $GenreController->delete($idGenre);
                }
                break;

            default:
                // error
                echo "Une erreur est survenue";
                break;
        }
    } else {
        require('./App/Views/Admin/AddMovie.php');
    }

} catch (Error $e) {
    require './Errorcatcher.php';
} catch (Exception $e) {
    require './Error404.php';
}
