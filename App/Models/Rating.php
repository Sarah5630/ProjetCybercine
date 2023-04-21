<?php

namespace Projet\Models;

use PDO;

class Rating extends Manager
{
    // Add a new rating to the database
    public function add($dateAdded, $rating, $idMovie, $pseudo)
    {
        // Connect to the database
        $db = $this->manager();

        // Prepare the SQL query for inserting the rating
        $req = $db->prepare('INSERT INTO ratings (DateAdded, Rating, IdMovie, Pseudo) 
        VALUES (:dateAdded, :rating, :idMovie, :pseudo)');

        // Bind the values to the parameters in the prepared statement
        $req->bindValue(':dateAdded', $dateAdded, PDO::PARAM_STR);
        $req->bindValue(':rating', $rating, PDO::PARAM_INT);
        $req->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        // Execute the query
        $req->execute();
    }

    // Get the average rating for a specific movie by its ID
    public function getAverageByIdMovie($idMovie)
    {
        // Connect to the database
        $db = $this->manager();

        // Prepare the SQL query to select ratings for the specified movie
        $req = $db->prepare("SELECT 
        ratings.IdRating, ratings.DateAdded, ratings.Rating, ratings.IdMovie, ratings.Pseudo
        FROM ratings 
        WHERE ratings.IdMovie = :idMovie");

        // Bind the movie ID parameter
        $req->bindParam(':idMovie', $idMovie, PDO::PARAM_INT);

        // Execute the query
        $req->execute();

        // Calculate the average rating
        $sumRating = 0;
        $nbRating = 0;
        while ($rating = $req->fetch(PDO::FETCH_ASSOC)) {
            $sumRating += $rating['Rating'];
            $nbRating++;
        }

        // Return the average rating (formatted to 2 decimal places) or 0 if no ratings
        return ($nbRating != 0) ? number_format($sumRating / $nbRating, 2) : 0;
    }
}
