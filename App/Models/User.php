<?php

namespace Projet\Models;

use PDO;

// Define User class which extends Manager class
class User extends Manager
{
    public $pseudo;
    public $email;
    public $password;
    public $name;
    public $firstname;
    public $role;

    // Constructor to initialize User object with optional parameters
    public function __construct($pseudo = null, $email = null, $password = null, $name = null, $firstname = null, $role = 0)
    {

        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->role = $role;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getRole()
    {
        return $this->role;
    }


    // Method to create a new user in the database
    public function createUser()
    {
        $db = $this->manager();

        // Hash the password
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        // Prepare the query to insert a new user into the 'users' table
        $req = $db->prepare('INSERT INTO users(pseudo, email, password, name, firstname, role) VALUES(:pseudo, :email, :password, :name, :firstname, :role)');

        // Bind the parameters to the prepared statement
        $req->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $req->bindValue(':name', $this->name, PDO::PARAM_STR);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':role', $this->role, PDO::PARAM_INT);

        // Execute the query
        $req->execute();
        return $req;
    }

    // Method to retrieve user information by the given pseudo
    public function getInfoUser($pseudo)
    {
        $db = $this->manager();

        // Prepare the query to get all information about the user
        $req = $db->prepare("SELECT * FROM users WHERE Pseudo = :pseudo");

        // Bind the parameter
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        // Execute the query
        $req->execute();

        // Return the result
        $row = $req->fetch(PDO::FETCH_ASSOC);
        //$user = new User($row);

        return $row;
    }

    // Method to update an existing user by his pseudo
    public function updateUser($pseudo, $email, $password, $name, $firstname)
    {
        // Retrieve the existing user using their pseudo
        $user = $this->getInfoUser($pseudo);

        // Check if the user exists
        if ($user) {

            // Connect to the database
            $db = $this->manager();

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL query to update user information
            $req = $db->prepare("UPDATE users SET email = :email, password = :password, name = :name, firstname = :firstname WHERE pseudo = :pseudo");

            // Bind the parameters to the prepared statement
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':firstname', $firstname, PDO::PARAM_STR);

            // Execute the query and check the result
            if ($req->execute()) {

                // Return a success message
                return "L'utilisateur a été mis à jour avec succès";
            } else {
                // Return an error message
                return "Une erreur s'est produite lors de la mise à jour de l'utilisateur";
            }
        } else {
            // Return an error message
            return "L'utilisateur n'a pas été trouvé";
        }
    }

    // Method to delete a user by their pseudo
    public function deleteUser($pseudo)
    {
        $db = $this->manager();

        // Prepare the query to delete a user from the 'users' table
        $req = $db->prepare("DELETE FROM users WHERE pseudo = :pseudo");

        // Bind the parameter to the prepared statement
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        // Execute the query
        if ($req->execute()) {
            return "L'utilisateur a été mis à jour avec succès";
        } else {
            // Retourner un message d'erreur ou autre indication
            return "Une erreur s'est produite lors de la mise à jour du compte";
        }
    }

    public function getUserByPseudo($pseudo)
    {
        // Connect to the database
        $db = $this->manager();

        // SQL query to retrieve the pseudo
        $req = $db->prepare("SELECT * FROM users WHERE Pseudo = :pseudo");
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        // Check if the result is empty
        if (empty($row)) {
            return null;
        }
        return $row['Pseudo'];
    }


    // Method to retrieve a user by his pseudo and password
    public function getUserByPseudoAndPassword($pseudo, $password)
    {
        // Connect to the database
        $db = $this->manager();

        // Prepare a SQL statement to select a user by username
        $req = $db->prepare("SELECT * FROM users WHERE Pseudo = :pseudo");

        // Bind the value 
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        // Fetch the first row from the result set as an associative array
        $user = $req->fetch();

        // If a user was found and the password matches the hashed password in the database
        if ($user && password_verify($password, $user['Password'])) {

            
            // Set the object's username property to the username of the found user
            $newUser= new User();
            $this->pseudo = $user['Pseudo'];
            $this->email = $user['Email'];
            $this->name = $user['Name'];
            $this->password = $user['Password'];
            $this->firstname = $user['Firstname'];
            $this->role = $user['Role'];


            // Return the user object
            return $newUser;
        } else {
            // If no user found or the password incorrect, return false
            return false;
        }
    }
}
