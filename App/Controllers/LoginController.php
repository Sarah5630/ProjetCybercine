<?php

namespace Projet\Controllers;

// Import the User model
use Projet\Models\User;


// Define the login controller
class LoginController
{

    // Function to display the login form
    public function showLoginForm()
    {
        require('./App/Views/Front/UserConnect.php');
    }

    public function processLogin()
    {
        // Check if POST data has been sent
        if (isset($_POST["pseudo"]) && isset($_POST["password"])) {
            // Get form data
            $pseudo = $_POST["pseudo"];
            $password = $_POST["password"];

            // Verify pseudo and password
            $user = new User();
            $ret = $user->getUserByPseudoAndPassword($pseudo, $password);
            if ($ret) {

                // If pseudo and password are valid, save user as logged in

                $_SESSION["pseudo"] = $user->getPseudo();
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["name"] = $user->getName();
                $_SESSION["firstname"] = $user->getFirstname();
                $_SESSION["role"] = $user->getRole();

                // Check user role
                if ($user->getRole() == 1) {
                    // Redirect user to admin page
                    header('Location: indexAdmin.php?action=addMovie');
                    exit();
                } else {
                    // Redirect user to home page
                    header('Location: index.php?action=goHome');
                    exit();
                }
            } else {
                // If pseudo or password are invalid, display an error message
                echo "pseudo ou mot de passe incorrect";
                require_once './App/Views/Front/UserConnect.php';
            }
        }
    }
    // Function to logout user
    public function logout()
    {
        // Check if user is logged in
        if (isset($_SESSION["pseudo"])) {
            // Destroy user session
            session_destroy();
        }

        // Redirect user to the login page
        header('Location: index.php?action=showLoginForm');
        exit();
    }
}
