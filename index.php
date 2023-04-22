<?php

// --------------------------Session start------------------------

session_start();

use \Projet\Controllers\UserController;
use \Projet\Controllers\MovieController;
use \Projet\Controllers\GenreController;
use \Projet\Controllers\LoginController;
use \Projet\Controllers\CommentController;


//---------------------------Composer autoload--------------------
require_once __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

try {
    $userController = new UserController();
    $movieController = new MovieController();
    $genreController = new GenreController();
    $loginController = new LoginController();
    $commentController = new CommentController();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'createUser':
                $userController->createUser();
                break;

            case 'deleteUser':
                if (isset($_POST['pseudo'])) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $userController->deleteUser($pseudo);
                }
                break;

            case 'displayUserInfo':
                $userController->displayUserInfo($_SESSION['pseudo']);
                break;

            case 'updateUser':
                if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['firstname'])) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = htmlspecialchars($_POST['password']);
                    $name = htmlspecialchars($_POST['name']);
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $userController->updateUser($pseudo, $email, $password, $name, $firstname);
                }
                break;

            case 'userConnect':
                $userController->userConnect();
                break;

            case 'login':
                if (isset($_POST['pseudo']) && isset($_POST['password'])) {
                    $loginController->processLogin();
                } else {
                    $loginController->showLoginForm();
                }
                break;

            case 'logout':
                session_destroy();
                header('Location: index.php?action=userConnect');
                exit();
                break;

            case 'readMovie':
                if (isset($_GET['idMovie'])) {
                    $idMovie = $_GET['idMovie'];
                    $movieController->getMovieById($idMovie);
                }
                break;

            case 'allMovies':
                $movieController->getAllMovies();

                break;

            case 'topMovies':
                $movieController->getTopRatedMovies();
                break;

            case 'addComment':
                $commentController->add();
                break;

            case 'goHome':
                $movieController->goHome();
                break;

            case 'contact':
                $userController->contact();
                break;

            case 'legal':
                $userController->legal();
                break;

            case 'role':
                if (!empty($_SESSION)) {
                    if ($_SESSION['role'] = 0) {
                        header('Location: index.php?action=gohome');
                    } else {
                        header('Location: indexAdmin.php?action=addMovie');
                    }
                }

            default:
                // error
                echo "Une erreur est survenue";
                break;
        }
    } else {
        $movieController->goHome();
    }
} catch (Error $e) {

    require './Errorcatcher.php';
} catch (Exception $e) {
    require './Error404.php';
}
