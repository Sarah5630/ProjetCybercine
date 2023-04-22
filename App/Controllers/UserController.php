<?php

namespace Projet\Controllers;

use Projet\Models\User;

class UserController
{

    // Create a new user
    public function createUser()
    {
        // Check if the form has been submitted
        if (isset($_POST['submit'])) {

            // Check if all fields have been filled out
            if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['firstname'])) {

                // Use htmlspecialchars() to ensure the security of the entered data
                // Create an array with the user data
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $name = htmlspecialchars($_POST['name']);
                $firstname = htmlspecialchars($_POST['firstname']);

                // Check if the pseudo already exists
                $user = new User();
                $existingUser = $user->getUserByPseudo($pseudo);
                if (!empty($existingUser)) {

                    // Display an error message if the pseudo already exists
                    // and return to the create account page
                    require('./App/Views/Front/CreateAccountUser.php');
                    return;
                }

                $newUser = new User($pseudo, $email, $password, $name, $firstname);
                $result = $newUser->createUser();

                // Check if the insertion was successful
                if ($result) {
                    // Redirect the user to another page
                    header('Location: index.php?action=goHome');
                    return;
                } else {
                    // Display an error message if the insertion failed
                    echo "Une erreur s'est produite lors de la création du compte";
                }
            } else {
                // Display an error message if not all fields are filled out
                echo "Merci de remplir tous les champs";
            }
        }
        // Load the create account page
        require('./App/Views/Front/CreateAccountUser.php');
    }


    // Delete an existing user
    public function deleteUser()
    {
        // Check if the user's username is present 
        if (isset($_POST['pseudo'])) {
            $pseudo = $_POST['pseudo'];

            // Instantiate a new User object
            $user = new User();

            // Check if the user exists
            $existingUser = $user->getUserByPseudo($pseudo);
            if (empty($existingUser)) {

                // Display an error message if the user does not exist
                echo "Le pseudo n'existe pas";
                return;
            }

            // Delete the user
            $result = $user->deleteUser($pseudo);
            echo "Le compte a bien été supprimé";
        } else {
            // Display an error message if the username is not present 
            echo "Veuillez renseigner votre pseudo";
        }
        // Load the account page
        require('./App/Views/Front/Account.php');
    }

    // Update user
    public function updateUser()
    {
        // Check if the form data has been submitted
        if (isset($_POST['submit'])) {

            // Get the form data
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);

            // Instantiate a new User object
            $user = new User();

            // Update the user
            $result = $user->updateUser($pseudo, $email, $password, $name, $firstname);

            // Handle the result
            if ($result) {

                // Display a success message
                echo "Votre profil a bien été mis à jour";
                // Redirect to another page
                header('Location: index.php?action=goHome');
            } else {

                // Display an error message
                echo "Une erreur s'est produite";
            }
        }
        // Load the account page
        require('./App/Views/Front/Account.php');
    }

    public function displayUserInfo($pseudo)
    {
        // Check if the user is logged in
        if (!isset($_SESSION['pseudo'])) {

            // Redirect to the login page with a message if the user is not logged in
            header('Location: index.php?action=login&message=Merci de vous connecter pour acceder à votre compte');
            exit();
        }

        // Create an instance of the User class
        $user = new User();

        // Get the user information from the database
        $userInfo = $user->getInfoUser($pseudo);

        // Display the account page with the user information
        require('./App/Views/Front/Account.php');
    }

    // Load the home page
    public function goHome()
    {
        require('./App/Views/Front/Home.php');
        exit();
    }

    // Load the user connection page
    public function userConnect()
    {
        require('./App/Views/Front/UserConnect.php');
        exit();
    }

    // Load the contact page
    public function contact()
    {
        require('./App/Views/Front/Contact.php');
        exit();
    }

    // Load the legal notices page
    public function legal()
    {
        require('App/Views/Front/LegalNotices.php');
        exit();
    }
}
